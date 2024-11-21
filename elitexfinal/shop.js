const cartButton = document.querySelector('.custom-button');
const imageGallery = document.querySelectorAll('.card img');

cartButton.addEventListener('click', () => {
  // Add the zoom effect to each image in the gallery
  card.forEach(image => {
    image.classList.toggle('zoomed');
  });
});

const pageButtons = document.querySelectorAll('.page-btn');
const pages = document.querySelectorAll('.page');

function showPage(pageNum) {
    pages.forEach(page => {
        page.style.display = 'none';
    });

    const selectedPage = document.querySelector(`.page-${pageNum}`);
    selectedPage.style.display = 'block';
}

pageButtons.forEach(button => {
    button.addEventListener('click', () => {
        const pageNum = button.getAttribute('data-page');
        showPage(pageNum);

        pageButtons.forEach(btn => {
            btn.classList.remove('active');
        });

        button.classList.add('active');
    });
});

// Show the initial page (Page 1)
showPage(1);
