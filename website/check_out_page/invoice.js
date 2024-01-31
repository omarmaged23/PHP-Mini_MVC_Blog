//----------------------------------------------In Summary Page ---------------------------
// Function to create a table row
const shipping = document.getElementById('shipping');
const shippingValue = Number(shipping.innerText);
function createTableRow(productImage, product_desc, stockStatus, price, quantity, size) {
  const tbody = document.querySelector('tbody');

  // Create a new table row
  const tr = document.createElement('tr');

  // Create table cells and content
  const cellsContent = [
      `<td class="cart-product"><a href="#"><img alt="" src="${productImage}"></a></td>`,
      `<td class="cart-description"><p class="product-name"><a href="#">${product_desc}</a></p><small><a href="#">Size : ${size}</a></small></td>`,
      `<td class="cart-avail"><span class="label label-success">${stockStatus}</span></td>`,
      `<td class="cart-unit"><span class="price">${price}</span></td>`,
      `<td class="cart_qty"><input class="cart-plus-minus" type="number" name="qty-btn" value="${quantity}" max="13" min="1" readonly></div></td>`,
      `<td class="cart-delete text-center"></td>`,
      `<td class="cart-total"><span class="price">${price * quantity}</span></td>`
  ];

  // Set the innerHTML of the table row
  tr.innerHTML = cellsContent.join('');

  // Append the new row to the tbody
  tbody.appendChild(tr);
}

// For The next page footer//////////////////////////////////////////////
function createTableFooter(totalProduct) {
  const tfoot = document.querySelector('tfoot');

  // Create a new table row for total products
  const trTotalProducts = document.createElement('tr');
  trTotalProducts.innerHTML = `<td class="cart_voucher" colspan="3" rowspan="4"></td>
                                  <td class="text-right" colspan="3">Total products (tax excl.)</td>
                                  <td id="total_product" class="price" colspan="1">${totalProduct}</td>`;
  tfoot.appendChild(trTotalProducts);

  // Create a new table row for total shipping
  const trTotalShipping = document.createElement('tr');
  trTotalShipping.innerHTML = `<td class="text-right" colspan="3">Total shipping</td>
                                  <td id="total_shipping" class="price" colspan="1">${shippingValue.toFixed(2)}</td>`;
  tfoot.appendChild(trTotalShipping);

  // Create a new table row for the overall total
  const trTotalPrice = document.createElement('tr');
  trTotalPrice.innerHTML = `<td class="total-price-container text-right" colspan="3"><span>Total</span></td>
                              <td id="total-price-container" class="price" colspan="1"><span id="total-price">$${(totalProduct + shippingValue).toFixed(2)}</span></td>`;
  tfoot.appendChild(trTotalPrice);
}
///////////////////////////////////////////////////////////////////////
// Example usage
// function to autoload cart items
function autoload(){
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  let total = 0;
  console.log(cart);
  for (let i = 0; i < cart.length; i++) {
      total += parseFloat(cart[i][4]) * parseInt(cart[i][5]);
      createTableRow(cart[i][1], cart[i][2], cart[i][3], cart[i][4], cart[i][5], cart[i][6]);
  }
  createTableFooter(total);
}
window.onload = autoload();


