<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once public_path('vendor/fpdf/fpdf.php');

/*─────────────────────────────────────────────\
|  CVController  – shows the form & streams PDF |
\──────────────────────────────────────────────*/
class CVController extends Controller
{
    /* show the form page */
    public function cv()
    {
        return view('pages/cv');   // resources/views/pages/cv.blade.php
    }

    /* generate & return the PDF */
    public function generate(Request $request)
    {
        /* handle uploads */
        $dir = public_path('uploads/');
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $photo = '';
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $name = time().'_'.preg_replace('/[^\w.\-]/u', '_',
                     $request->file('profile_picture')->getClientOriginalName());
            $request->file('profile_picture')->move($dir, $name);
            $photo = 'uploads/'.$name;
        }

        $certs = [];
        if ($request->hasFile('certificates')) {
            foreach ($request->file('certificates') as $file) {
                if ($file->isValid()) {
                    $name = time().'_'.preg_replace('/[^\w.\-]/u', '_', $file->getClientOriginalName());
                    $file->move($dir, $name);
                    $certs[] = 'uploads/'.$name;
                }
            }
        }

        /* collect form data */
        $d = [
            'name'             => $request->input('name',''),
            'birthday'         => $request->input('birthday',''),
            'address'          => $request->input('address',''),
            'email'            => $request->input('email',''),
            'phone'            => $request->input('phone',''),
            'photo'            => $photo,
            'position'         => $request->input('position',''),
            'responsibilities' => $request->input('responsibilities',''),
            'education'        => $request->input('education',''),
            'career'           => $request->input('career',''),
            'languages'        => $request->input('languages',''),
            'report_writing'   => $request->input('report_writing',''),
            'computing_skills' => $request->input('computing_skills',''),
            'memberships'      => $request->input('memberships',''),
            'certificates'     => $certs,
        ];

        /* build & stream PDF */
        $pdf = new CVGenerator($d);
        return response($pdf->Output('S', 'cv.pdf'))
               ->header('Content-Type', 'application/pdf');
    }
}

/*─────────────────────────────────────────────\
|  CVGenerator  – FPDF subclass                |
\──────────────────────────────────────────────*/
class CVGenerator extends \FPDF
{
    /* state */
    private $d;
    private $B = 0; private $I = 0; private $U = 0;
    private $ALIGN = '';            // active <center>/<right>
    private $HREF  = '';            // active <a>
    private $inList = false;        // inside <ul>
    private $liOpen = false;        // inside <li>
    private $bulletW = 0;           // width of bullet glyph

    public function __construct(array $data)
    {
        parent::__construct();
        /* DejaVu fonts must be in /font */
        $this->AddFont('DVS','',  'DejaVuSansCondensed.php');
        $this->AddFont('DVS','B', 'DejaVuSansCondensed-Bold.php');
        $this->AddFont('DVS','I', 'DejaVuSansCondensed-Oblique.php');
        $this->AddFont('DVS','BI','DejaVuSansCondensed-BoldOblique.php');
        $this->SetFont('DVS','',12);

        $this->bulletW = $this->GetStringWidth(chr(149)) + 2;
        $this->d = $data;

        $this->AddPage();
        $this->render();
    }

    /*──────── helpers ───────*/
    private function sectionTitle(string $text): void
    {
        $this->SetFont('DVS','B',14);
        $this->SetFillColor(220,220,220);
        $this->Cell(0,10,$text,0,1,'L',true);
        $this->Ln(2);
        $this->SetFont('DVS','',12);
    }

    private function infoRow(string $label,string $val): void
    {
        $clean = trim(strip_tags(html_entity_decode($val ?: '-', ENT_QUOTES|ENT_HTML5,'UTF-8')));
        $clean = preg_replace('/\s*\n\s*/', ' ', $clean);   // collapse line breaks
        $this->SetFont('DVS','B',12);
        $this->Cell(40,8,$label,0,0);
        $this->SetFont('DVS','',12);
        $this->MultiCell(0,8,$clean,0,1);
    }
/*── inline “Label: value” without blank gap ───────────────────*/
private function richInline(string $label, ?string $html = null): void
{
    if ($html === null || trim(strip_tags($html)) === '') {
        $html = '-';
    }

    // Clean content to prevent auto line breaks
    $cleaned = str_replace(["\r", "\n"], ' ', $html);
    $cleaned = preg_replace('/<\/?(p|div|h\d)[^>]*>/i', '', $cleaned); // remove block tags
    $cleaned = str_replace('&nbsp;', ' ', $cleaned); // normalize spaces
    $cleaned = preg_replace('/\s+/', ' ', $cleaned); // collapse multiple spaces

    // Print bold label inline
    $this->SetFont('DVS', 'B', 12);
    $this->Write(6, rtrim($label, ':') . ': ');

    // Continue writing with rich formatting
    $this->SetFont('DVS', '', 12);
    $this->WriteHTML($cleaned);

    $this->Ln(6);
}





    /*──────── build page ───────*/
    private function render(): void
    {
        $d = $this->d;

        /* header */
        $this->SetFont('DVS','B',20);
        $this->Cell(0,15,'CURRICULUM VITAE',0,1,'C');
        $this->Ln(5);

        $yStart = $this->GetY();

        /* profile photo */
        if ($d['photo'] && file_exists(public_path($d['photo']))) {
            $this->Image(public_path($d['photo']),155,$yStart+5,45);
        }

        /* personal info */
        $this->SetXY(10,$yStart+5);
        $this->infoRow('Name:',     $d['name']);
        $this->infoRow('Birthday:', $d['birthday']);
        $this->infoRow('Address:',  $d['address']);
        $this->infoRow('Email:',    $d['email']);
        $this->infoRow('Phone:',    $d['phone']);

        $this->SetY(max($this->GetY(), $yStart + 55));

        /* rich‑text sections */
        foreach ([
            'position'         => 'Position and Area',
            'responsibilities' => 'Designated Responsibilities',
            'career'           => 'Career Experience',
            'education'        => 'Education',
        ] as $key => $title) {
            if (trim(strip_tags($d[$key])) !== '') {
                $this->Ln(7);
                $this->sectionTitle($title);
                $this->WriteHTML($d[$key]);
            }
        }

        /* skills & interests */
        $this->Ln(7);
        $this->sectionTitle('Skills and Interests');

        $this->richInline('Languages:',        $d['languages']);
        $this->richInline('Report Writing:',   $d['report_writing']);
        $this->richInline('Computing Skills:', $d['computing_skills']);

        $this->SetFont('DVS','B',12);
        $this->MultiCell(0,8,'Memberships / Interests:');
        $this->SetFont('DVS','',12);
        $this->WriteHTML($d['memberships'] ?: '-');
        $this->Ln(7);

        /* certificates */
        if ($d['certificates']) {
            $this->Ln(7);
            $this->sectionTitle('Certificates Uploaded');
            foreach ($d['certificates'] as $c) {
                $this->SetTextColor(0,0,255);
                $this->Write(8,'- '.basename($c), url($c));
                $this->Ln(7);
            }
            $this->SetTextColor(0,0,0);
        }

        /* footer date */
        $this->Ln(10);
        $this->SetFont('DVS','',10);
        $this->Cell(0,8,'Generated on '.date('j F Y'),0,1,'L');
    }

    /*──────── footer bar ───────*/
    public function Footer(): void
    {
        $this->SetY(-15);
        $this->SetFont('DVS','',10);
        $this->SetTextColor(100,100,100);
        $this->Cell(0,10,
            'Powered by BrightBridge.uz - Inspiring innovation, enabling careers.',
            0,0,'C');
    }

    /*──────── HTML -> PDF ───────*/
  public function WriteHTML(string $html, bool $inline = false): void

    {
        /* normalise CKEditor HTML */
        $html = str_replace(["\r","\n"],' ',$html);
        $html = preg_replace('/<br\s*\/?>/i', "\n", $html);
        $html = preg_replace('/<\/p>|<\/div>|<\/h\d>/i', "\n", $html);
        $html = preg_replace('/<p[^>]*>|<div[^>]*>/i', '', $html);
        $html = str_replace('&nbsp;',' ',$html);
        $html = preg_replace('/\n{2,}/', "\n", $html);

        $parts = preg_split('/(<[^>]+>)/', $html, -1,
                 PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        foreach ($parts as $chunk) {
            if ($chunk[0] === '<') {                       /* TAG */
                $closing = $chunk[1] === '/';
                $tag = strtoupper(trim(strtok(trim($chunk,'<>/')," \t")));

                if ($closing) {
                    $this->CloseTag($tag);
                    if ($tag==='LI') { $this->liOpen=false; $this->Ln(1); }
                    if ($tag==='UL') { $this->inList=false; $this->Ln(2); }
                    continue;
                }

                $attrs=[];
                if (preg_match_all('/(\w+)\s*=\s*"([^"]*)"/',$chunk,$m,PREG_SET_ORDER)) {
                    foreach($m as $a) $attrs[strtoupper($a[1])]=$a[2];
                }
                $this->OpenTag($tag,$attrs);

                if ($tag==='UL') { $this->inList=true; $this->Ln(2); }
                if ($tag==='LI') { $this->liOpen=true; }
                if ($tag==='BR') { $this->Ln(4); }
                continue;
            }

            /* TEXT */
            $text = html_entity_decode($chunk, ENT_QUOTES|ENT_HTML5,'UTF-8');
            if ($text==='') continue;
            foreach (explode("\n",$text) as $i=>$line) {
                if ($i>0) $this->Ln(4);
                $line = trim($line);
                if ($line==='') continue;
                if ($this->liOpen) $this->Cell($this->bulletW,6,chr(149),0,0);
                if ($this->HREF) {
                    $this->SetTextColor(0,0,255); $this->SetStyle('U',true);
                    $this->MultiCell(0,6,$line,0,'L');
                    $this->SetStyle('U',false);   $this->SetTextColor(0,0,0);
                } else {
                   if ($inline) {
    $this->Write(6, $line);
} else {
    $this->MultiCell(0,6,$line,0,$this->ALIGN ?: 'L');
}

                }
            }
        }
    }

    /*──────── tag helpers ───────*/
    private function OpenTag(string $tag,array $attr): void
    {
        if ($tag=='B'||$tag=='STRONG') $this->SetStyle('B',true);
        if ($tag=='I'||$tag=='EM')     $this->SetStyle('I',true);
        if ($tag=='U')                 $this->SetStyle('U',true);
        if ($tag=='H1') $this->SetFont('DVS','B',18);
        if ($tag=='H2') $this->SetFont('DVS','B',16);
        if ($tag=='CENTER') $this->ALIGN='C';
        if ($tag=='RIGHT')  $this->ALIGN='R';
        if ($tag=='A'&&isset($attr['HREF'])) $this->HREF=$attr['HREF'];
    }

    private function CloseTag(string $tag): void
    {
        if ($tag=='B'||$tag=='STRONG') $this->SetStyle('B',false);
        if ($tag=='I'||$tag=='EM')     $this->SetStyle('I',false);
        if ($tag=='U')                 $this->SetStyle('U',false);
        if ($tag=='H1'||$tag=='H2')    $this->SetFont('DVS','',12);
        if ($tag=='CENTER'||$tag=='RIGHT') $this->ALIGN='';
        if ($tag=='A') $this->HREF='';
    }

    /*──────── font style helper ───────*/
    private function SetStyle(string $tag,bool $on): void
    {
        $this->$tag += $on ? 1 : -1;
        $s=''; foreach(['B','I','U'] as $t) if($this->$t>0) $s.=$t;
        $this->SetFont('DVS',$s,12);
    }
}
