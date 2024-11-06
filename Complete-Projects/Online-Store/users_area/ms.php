<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image" href="../img/shop.png">
  <title>Message of thanks</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../E-style/ms.css" />
  <script type="text/javaScript"src="script.js"></script>

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
  <section>
    <button class="show-modal">Confirm Payment</button>
    <span class="overlay"></span>

    <div class="modal-box">
      <i class="fa-regular fa-circle-check"></i>
      <h2>Completed</h2>
      <h3>You have successfully completed your purchase, Please visit us again.</h3>

      <div class="buttons">

        <button onclick="document.location= 'profile.php?my_orders','_self'">Continue</button>
      </div>
    </div>
  </section>

  <script>
    const section = document.querySelector("section"),
    overlay = document.querySelector(".overlay"),
    showBtn = document.querySelector(".show-modal"),
    closeBtn = document.querySelector(".close-btn");

    showBtn.addEventListener("click", () => section.classList.add("active"));

    overlay.addEventListener("click", () => section.classList.remove("active"));

    closeBtn.addEventListener("click", () => section.classList.remove("active"));
  </script>
</body>

</html>