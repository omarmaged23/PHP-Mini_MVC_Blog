//----------------------------------------------In Summary Page ---------------------------
// Function to create a table row
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
        `<td class="cart_qty"><div class="cart-plus-minus-button"><div class="inc-btn" onclick="inc_quantity(this)"><i class="fa-solid fa-plus"></i></div><input class="cart-plus-minus" type="number" name="qty-btn" value="${quantity}" max="13" min="1" readonly><div class="dec-btn" onclick="dec_quantity(this)"><i class="fa-solid fa-minus"></i></div></div></td>`,
        `<td class="cart-delete text-center"><i class="fa-solid fa-trash" style="font-size:26px; color: black;" onclick="deleteRow(this)"></i></td>`,
        `<td class="cart-total"><span class="price">${price * quantity}</span></td>`
    ];

    // Set the innerHTML of the table row
    tr.innerHTML = cellsContent.join('');

    // Append the new row to the tbody
    tbody.appendChild(tr);
}
// Function to create a table footer
function createTableFooter(totalProduct) {
    const tfoot = document.querySelector('tfoot');

    // Create a new table row for total products
    const trTotalProducts = document.createElement('tr');
    trTotalProducts.innerHTML = `<td class="cart_voucher" colspan="3" rowspan="4"></td>
                                    <td class="text-right" colspan="3">Total products (tax excl.)</td>
                                    <td id="total_product" class="price" colspan="1">${totalProduct}</td>`;
    tfoot.appendChild(trTotalProducts);

}
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


// // Remove Item From A Cart
function deleteRow(button) {
    let row = button.parentNode.parentNode;
    let rowIndex = row.rowIndex;
    // Remove the row from the table
    document.querySelector("table").deleteRow(rowIndex);
    delete_localStorage_item(rowIndex);
    // Print the index of the deleted row
    console.log("Deleted row index: " + rowIndex);
}
function delete_localStorage_item(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const modifed_cart = cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(modifed_cart));
    count -= 1;
    cart_counter.innerHTML = count;
    console.log("deleted from local storage succssfully");
}
function update_localstorage_itemQty(index,inc){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if(inc)
    {
        cart[index][5] = String(parseInt(cart[index][5]) + 1);  
    }
    else
    {
        cart[index][5] = String(parseInt(cart[index][5]) - 1);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
}
function inc_quantity(button){
    console.log("clicked");
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    console.log(cart);
    let row = button.parentNode.parentNode.parentNode;
    let rowIndex = row.rowIndex;
    console.log(rowIndex+typeof rowIndex);
    let qty_box = button.parentNode.querySelector("input");
    let qty_val  = parseInt(qty_box.value);
    if(qty_val < 9)
    {
        qty_val+=1;
        update_row_total(row,qty_val);
        update_localstorage_itemQty(rowIndex-1,1);
    }
    qty_box.value=qty_val;
}
function dec_quantity(button){
    console.log("clicked");
    let row = button.parentNode.parentNode.parentNode;
    let rowIndex = row.rowIndex;
    let qty_box = button.parentNode.querySelector("input");
    let qty_val  = parseInt(qty_box.value);
    if(qty_val > 0)
    {
        qty_val-=1;
        update_row_total(row,qty_val);
        update_localstorage_itemQty(rowIndex-1,0);
    }
    qty_box.value=qty_val;
}
function update_row_total(row,qty){
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    console.log(cart);
    let cart_total = row.querySelector(".cart-total .price"); 
    let cart_unitPrice = row.querySelector(".cart-unit .price");
    let total = parseFloat(cart_unitPrice.textContent,10) * qty;
    let totalCartPrice = document.getElementById('total_product');
    console.log(cart_total.innerText);
    // console.log(totalCartPrice.innerText +" "+typeof totalCartPrice.innerText);
    totalCartPrice.innerText=Number(totalCartPrice.innerText)-Number(cart_total.innerText);
    cart_total.textContent= total;
    // console.log(totalCartPrice.innerText + typeof totalCartPrice.innerText);
    // console.log(total + typeof total);
    totalCartPrice.innerText=(Number(totalCartPrice.innerText)+Number(total));
}
