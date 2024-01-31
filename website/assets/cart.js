// --- Start Single Product Page ( Add To Cart)
let add_btn = document.getElementById("addTocart");
let cart_counter = document.getElementById("cart-counter");
//Prduct Info
let product_id = document.getElementById("product-id");
let product_img = document.querySelector(".s_p_image img");
let product_desc = document.querySelector(".desc > p");
let product_price = document.querySelector(".salary > h2");
let product_qty = document.getElementById("product-qty");
let product_size = document.getElementById("product-size");
// Cart Counter 
let init_cnt = JSON.parse(localStorage.getItem('cart')) || [];
let count = init_cnt.length;
cart_counter.innerHTML = count;
console.log(init_cnt);

// console.log(product_id.innerText);
// console.log(product_img.src);
// console.log(product_desc.innerText);
// console.log(product_price.innerText);
// console.log(product_qty.value);
// console.log(product_size.value);

add_btn.onclick = function () {

  let product = [];
  product.push(product_id.innerText);
  product.push(product_img.src);
  product.push(product_desc.innerText);
  product.push("In stock");
  product.push(product_price.innerText.substring(1));
  product.push(product_qty.value);
  product.push(product_size.value);

  console.log(product);

  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push(product);
  localStorage.setItem('cart', JSON.stringify(cart));
  count += 1;
  cart_counter.innerHTML = count
}
// End Add To Cart





