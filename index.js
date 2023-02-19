// Init
createCartControl();
createHeaderFilterControl();

// Đóng mở giỏ hàng trên giao diện mobile
function createCartControl () {
    let btnOpen = document.getElementById('menu-btn-open-cart');
    let btnClose = document.getElementById('cart-navbar-btn-close');
    let cart = document.getElementById('cart');

    let isOpen = false;
    let isOpening = false;
    let isClosing = false;

    // Open
    btnOpen.onclick = () => {
        if (isOpen || isClosing) return;
        isOpen = true;
        isOpening = true;

        cart.classList.add('animated', 'fadeInRight', 'open');

        cart.onanimationend = () => {
            if (isOpening) {
                isOpening = false;
                cart.classList.remove('animated', 'fadeInRight');
            }
        }
    }

    // Close
    btnClose.onclick = () => {
        if (!isOpen || isOpening) return;
        isClosing = true;

        cart.classList.add('animated', 'fadeOutRight');

        cart.onanimationend = () => {
            if (isClosing) {
                isClosing = false;
                cart.classList.remove('animated', 'fadeOutRight', 'open');
                isOpen = false;
            }
        }
    }
}

// Đóng mở filter trên header
function createHeaderFilterControl () {
    let filter = document.getElementById('header-filter');
    let btnClose = document.getElementById('header-filter-navbar-btn-close');
    let btnOpen = document.getElementById('header-btn-open-filter');

    let isOpen = false;
    let isOpening = false;
    let isClosing = false;

    // Open
    btnOpen.onclick = () => {
        if (isOpen || isClosing) return;
        isOpen = true;
        isOpening = true;

        window.scrollTo(0, 0);

        filter.style.display = 'flex';
        filter.classList.add('animated', 'fadeIn');

        filter.onanimationend = () => {
            if (isOpening) {
                isOpening = false;
                filter.classList.remove('animated', 'fadeIn');
            }
        }
    }

    // Close
    btnClose.onclick = () => {
        if (!isOpen || isOpening) return;
        isClosing = true;

        filter.classList.add('animated', 'fadeOut');

        filter.onanimationend = () => {
            if (isClosing) {
                isClosing = false;
                filter.classList.remove('animated', 'fadeOut');
                filter.style.display = 'none';
                isOpen = false;
            }
        }
    }
}