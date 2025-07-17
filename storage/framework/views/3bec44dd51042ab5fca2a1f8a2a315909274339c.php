<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Online CV Builder</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>

  <style>
    * { box-sizing: border-box; }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f9f9f9;
      padding: 20px; margin: 0;
      color: #333;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
      font-size: 24px;
    }
    form {
      background: #fff;
      max-width: 600px;
      width: 100%;
      margin: auto;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    .field {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      font-size: 14px;
      color: #34495e;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s;
    }
    textarea {
      min-height: 120px;
    }
    input:focus, textarea:focus {
      border-color: #2980b9;
      outline: none;
    }
    input[type="file"] {
      background-color: #f4f4f4;
      padding: 7px;
    }
    button {
      padding: 12px 20px;
      font-size: 15px;
      font-weight: 600;
      background-color: #2980b9;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.1s;
    }
    button:hover {
      background-color: #1f6391;
    }
    button:active {
      transform: scale(0.98);
    }
    .add-cert-btn {
      background: #27ae60;
      margin-top: 10px;
    }
    @media(max-width: 480px) {
      body { padding: 10px; }
      form { padding: 20px; }
      label, input, textarea, button {
        font-size: 13px;
      }
      button {
        width: 100%;
        margin-top: 8px;
      }
    }
  </style>
</head>
<body>

<!-- Only form labels are updated below -->
<form action="/generate-cv" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <h2>Online CV Builder</h2>

  <div class="field"><label>Name / Ism / Имя:</label><input type="text" name="name" required></div>
  <div class="field"><label>Birthday / Tug‘ilgan sana / Дата рождения:</label><input type="date" name="birthday"></div>
  <div class="field"><label>Address / Manzil / Адрес:</label><input type="text" name="address"></div>
  <div class="field"><label>Email / Elektron pochta / Эл. почта:</label><input type="email" name="email"></div>
  <div class="field"><label>Phone / Telefon / Телефон:</label><input type="text" name="phone"></div>

  <div class="field">
    <label>Profile Picture / Profil rasmi / Фото профиля:</label>
    <input type="file" name="profile_picture" accept="image/*">
  </div>

  <!-- Rich Text Fields -->
  <div class="field"><label>Position and Area / Lavozim va yo‘nalish / Должность и направление:</label><textarea id="position" name="position"></textarea></div>
  <div class="field"><label>Designated Responsibilities / Belgilangan vazifalar / Назначенные обязанности:</label><textarea id="responsibilities" name="responsibilities"></textarea></div>
  <div class="field"><label>Education (mention all institutions) / Ta'lim (barcha muassasalarni ko‘rsating) / Образование (укажите все учреждения):</label><textarea id="education" name="education"></textarea></div>
  <div class="field"><label>Career Experience / Mehnat tajribasi / Опыт работы:</label><textarea id="career" name="career"></textarea></div>
  <div class="field"><label>Languages / Tillar / Языки:</label><textarea id="languages" name="languages"></textarea></div>
  <div class="field"><label>Report Writing / Hisobot yozuvi / Составление отчетов:</label><textarea id="report_writing" name="report_writing"></textarea></div>
  <div class="field"><label>Computing Skills / Kompyuter ko‘nikmalari / Компьютерные навыки:</label><textarea id="computing_skills" name="computing_skills"></textarea></div>
  <div class="field"><label>Memberships / Interests / A'zoliklar / Qiziqishlar / Членство / Интересы:</label><textarea id="memberships" name="memberships"></textarea></div>

  <!-- Certificates -->
  <div class="field">
    <label>Certificates / Diplomas or Other Documents / Sertifikatlar / Diplomlar yoki boshqa hujjatlar / Сертификаты / Дипломы и другие документы:</label>
    <div id="certificates">
      <input type="file" name="certificates[]" accept=".pdf,.jpg,.png,.jpeg,.doc,.docx">
    </div>
    <button type="button" class="add-cert-btn" onclick="addCertificate()">Add another certificate</button>
  </div>

  <div class="field">
    <button type="submit">Generate CV PDF</button>
  </div>
</form>

<script>
  // Enable CKEditor on all rich fields
  const richFields = [
    'position', 'responsibilities', 'education', 'career',
    'languages', 'report_writing', 'computing_skills', 'memberships'
  ];
  richFields.forEach(id => {
    CKEDITOR.replace(id, {
      on: {
        instanceReady: function() {
          // Hide warnings/notifications
          [0, 300, 600].forEach(delay =>
            setTimeout(() => document.querySelectorAll('.cke_notification, .cke_notification_warning')
              .forEach(el => el.style.display = 'none'), delay)
          );
        }
      }
    });
  });

  function addCertificate() {
    const div = document.createElement('div');
    div.innerHTML = '<input type="file" name="certificates[]" accept=".pdf,.jpg,.png,.jpeg,.doc,.docx" style="margin-top:8px;">';
    document.getElementById('certificates').appendChild(div);
  }
</script>

</body>
</html>
<?php /**PATH /home/brightbr/public_html/resources/views/pages/cv.blade.php ENDPATH**/ ?>