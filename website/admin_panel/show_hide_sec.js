let addProduct_sec = document.getElementById('create-product');
let mangeProduct_sec = document.getElementById('mange-product');
let dashboard_sec = document.getElementById('dashboard-sec');
let settings_sec = document.getElementById('settings-sec');
let orders_sec = document.getElementById('orders-sec');
window.onload=function(){
    addProduct_sec.style.display='none';
    mangeProduct_sec.style.display='none';
    dashboard_sec.style.display='none';
    settings_sec.style.display='none';
    orders_sec.style.display='none';
}
// $("#products_btn").click(function(){
    //     $("#mange-product").show();
    
    // });
    // ------------------Left Side Button ------------------
    let dashboard_btn = document.getElementById("dashboard_btn");
    let products_btn = document.getElementById("products_btn");
    let addNew_btn = document.getElementById("add_newProduct");
    let orders_btn = document.getElementById("orders_btn");
    let settings_btn = document.getElementById("settings_btn");
    let logout_btn = document.getElementById("logout_btn");
    // let edit_btn = document.getElementById("edit-btn");
    // let delete_btn = document.getElementById("delete-btn");
    dashboard_btn.onclick=function(){
        Hide(addProduct_sec);
        Hide(settings_sec);
        Hide(mangeProduct_sec);
        Show(dashboard_sec);
    }
    products_btn.onclick=function(){
        Hide(addProduct_sec);
        Hide(settings_sec);
        Show(mangeProduct_sec);
        Hide(dashboard_sec);
        Hide(orders_sec);
    }
    settings_btn.onclick=function(){
        Hide(addProduct_sec);
        Show(settings_sec);
        Hide(mangeProduct_sec);
        Hide(dashboard_sec);
        Hide(orders_sec);
    }
    addNew_btn.onclick=function(){
        Show(addProduct_sec);
        Hide(settings_sec);
        Hide(mangeProduct_sec);
        Hide(dashboard_sec);
        Hide(orders_sec);
    }
    orders_btn.onclick=function(){
        Hide(addProduct_sec);
        Hide(settings_sec);
        Hide(mangeProduct_sec);
        Hide(dashboard_sec);
        Show(orders_sec);
    }
    // edit_btn.onclick=function(){
    //     Show(addProduct_sec);
    //     Hide(settings_sec);
    //     Hide(mangeProduct_sec);
    //     Hide(dashboard_sec);
    // }
    function Hide(div){
        div.style.display='none';
    }
    function Show(div){
        div.style.display='block';
    }
    //---------------End Left Side Button