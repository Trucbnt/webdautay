$(".navbar__account-user").click(function(e) {
    $(".navbar__account--wrap").toggle();
})
$(".fa-cart-shopping").click(function(e) {
    $(".header__cart-list").toggle();
})

const deleteButtons = document.querySelectorAll('.header__cart-delete');
deleteButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const cartItem = button.closest('.header__cart-item');
    if (cartItem) {
      cartItem.remove();
    }
  });
});