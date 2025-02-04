import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('.slider');
    const slides = Array.from(slider.children);
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    let slideIndex = 0;

    // Устанавливаем начальное положение
    const slide = () => {
        // Обновляем transform для правильного сдвига слайдов
        slider.style.transition = 'transform 0.5s ease-in-out';
        slider.style.transform = `translateX(-${slideIndex * 100}%)`;  // Используем проценты, чтобы слайды занимали всю ширину
    };

    prevButton.addEventListener('click', () => {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        slide();
    });

    nextButton.addEventListener('click', () => {
        slideIndex = (slideIndex + 1) % slides.length;
        slide();
    });

    slide(); // Установить начальное положение
});

document.addEventListener('click', (e) => {
    if (e.target.closest('.accordion-header')) {
        const button = e.target.closest('.accordion-header');
        const content = button.nextElementSibling;
        const icon = button.querySelector('p:last-child');

        if (content.style.height && content.style.height !== '0px') {
            content.style.height = '0px';
            icon.textContent = '+';
        } else {
            content.style.height = content.scrollHeight + 'px';
            icon.textContent = '×';
        }

        document.querySelectorAll('.accordion-content').forEach((otherContent) => {
            if (otherContent !== content) {
                otherContent.style.height = '0px';
                otherContent.previousElementSibling.querySelector('p:last-child').textContent = '+';
            }
        });
    }
});
