// function toggleSubmitButton() {
//   var checkBox = document.getElementsByName("removeitem[]");
//   var submitButton = document.getElementByName("remove_cart");
//   submitButton.disabled = !checkBox.checked;
// }

// document.addEventListener("DOMContentLoaded", function () {
//   var checkBox = document.querySelector('input[type="checkbox"]');
//   var submitButton = document.querySelector('input[type="submit"]');

//   checkBox.addEventListener("change", function () {
//     submitButton.disabled = !this.checked;
//   });
// });

// Acteve remove cart button
document.addEventListener("DOMContentLoaded", function () {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var deleteButton = document.querySelector(".delete-button");

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      deleteButton.disabled = !Array.from(checkboxes).some((cb) => cb.checked);
    });
  });

  // في البداية يكون الزر معطل
  deleteButton.disabled = true;
});

// // حقل الكتي

//   <input type='number' class='form-control text-center mb-3' id='exampleNumber' name='buy_qty' placeholder='Enter your quintity' min='1' autofocus></input>

// بارغراف الكتي

/* <td>
<p><?php echo $qty ?></p>
</td> */
