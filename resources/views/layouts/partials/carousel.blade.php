<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- Cards will be dynamically added here -->
    </div>
    <button id="scrollLeftBtn" class="swiper-button-prev"></button>
    <button id="scrollRightBtn" class="swiper-button-next"></button>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Fetch carousel data
        $.ajax({
            url: '/courses/carousel',
            method: 'GET',
            success: function (response) {
                if (response.data && Array.isArray(response.data) && response.data.length > 0) {
                    var swiper = new Swiper('.swiper-container', {
                        slidesPerView: 6, // Display 6 cards at once
                        spaceBetween: 20,
                        navigation: {
                            nextEl: '#scrollRightBtn',
                            prevEl: '#scrollLeftBtn',
                        },
                    });

                    response.data.forEach(function (course, index) {
                        var cardHtml = '<div class="swiper-slide">' +
                            '<div class="card">' +
                            '<div class="card-header">'+course.name+'</div>' +
                            '<div class="card-img-container">' +
                            '<img src="' + course.course_img_url + '" class="card-img-top" alt="Course Image">' +
                            '</div>' +
                            '<div class="card-content">' +
                            '<p class="card-text">' + course.description + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('.swiper-wrapper').append(cardHtml);
                    });
                } else {
                    console.error('Invalid or empty response format:', response);
                }
            },
            error: function (error) {
                console.error('Error fetching carousel data:', error.responseText);
            }
        });
    });
</script>

<style>
    body {
        margin: 0;
        overflow-x: hidden; /* Hide horizontal overflow */
        font-family: 'Arial', sans-serif; /* Use a modern font */
    }

    .swiper-container {
        width: 100%; /* Set the width of the container to 100% */
        overflow: hidden; /* Hide overflow content */
        position: relative;
    }

    .swiper-slide {
        width: calc(100% / 6 - 20px); /* Adjust the width based on the number of slides */
        box-sizing: border-box; /* Include padding and border in the width calculation */
        background-color: #fff; /* Card background color */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .swiper-slide:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-img-container {
        flex: 1;
        overflow: hidden;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-content {
        padding: 15px;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #333;
    }

    .card-text {
        font-size: 1rem;
        color: #666;
    }

    .swiper-button-prev,
    .swiper-button-next {
        font-size: 2em;
        color: #333;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
    }

    .swiper-button-prev {
        left: 10px;
    }

    .swiper-button-next {
        right: 10px;
    }

    .swiper-button-prev::before,
    
</style>

