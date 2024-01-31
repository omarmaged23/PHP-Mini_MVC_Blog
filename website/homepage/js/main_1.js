let span = document.getElementsByClassName('move');
let product = document.getElementsByClassName('product');
let product_page = Math.ceil(product.length / 4);
let l = 0;
let movePer = 25.34;
let maxMove = 203;

// mobile_view	
let mob_view = window.matchMedia("(max-width: 768px)");

if (mob_view.matches) {
    movePer = 50.36;
    maxMove = 504;
}

let right_mover = () => {
    l = l + movePer;
    
    // Check if reached the last product //! Return to the first product
    if (l > maxMove-(50.36)) {
        l = 0; 
    }

    for (const i of product) {
        i.style.left = '-' + l + '%';
    }
};

let left_mover = () => {
    l = l - movePer;
    if (l < 0) {
        l = maxMove; // Move to the last product when reaching the beginning
    }
    if (l > maxMove-(50.36)) {
        l = 0; // Reset to the first product
    }

    for (const i of product) {
        i.style.left = '-' + l + '%';
    }
};
span[1].addEventListener('click', function(e) {
    right_mover();
});
span[0].addEventListener('click', function(e) {
    left_mover();
});
/////////////////////////////////////////
$(".toggle-menue").click(function () {
    $(".header nav .links ul").toggle({
    });
});
