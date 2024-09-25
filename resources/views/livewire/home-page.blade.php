<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sofasy Sliding Animation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Add custom sliding animation */
    @keyframes slideIn {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideOut {
      0% {
        transform: translateX(0);
        opacity: 1;
      }
      100% {
        transform: translateX(-100%);
        opacity: 0;
      }
    }

    .sliding-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 500px;
    }

    .slide {
      position: absolute;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      z-index: 1;
      opacity: 0;
      transition: opacity 1.5s ease-in-out;
    }

    .active {
      opacity: 1;
    }

    /* Arrow Styles */
    .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 12px;
      cursor: pointer;
      border-radius: 50%;
    }

    .arrow-left {
      left: 10px;
    }

    .arrow-right {
      right: 10px;
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="sliding-container relative w-full h-screen">
    <!-- First image with background and animation -->
<div class="slide active" style="background-image: url('images/Sofasy1.png'); z-index: 1; height: 500px;"></div>

<!-- Second image with a delay for sliding effect -->
<div class="slide" style="background-image: url('images/Sofasy2.png'); z-index: 1; height: 500px;"></div>

    <!-- Text overlay for the first image -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-10">
      <h1 class="text-5xl font-bold">Welcome to Sofasy!</h1>
      <p class="text-2xl mt-4">DESIGN SOFA 2019</p>
      <p class="text-lg mt-2">Free Shipping on orders over $99.</p>
      <button class="mt-6 px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg">
        Shop Now
      </button>
    </div>

    <!-- Left Arrow -->
    <div class="arrow arrow-left" onclick="prevSlide()">&#10094;</div>

    <!-- Right Arrow -->
    <div class="arrow arrow-right" onclick="nextSlide()">&#10095;</div>

  </div>

  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
          slide.classList.add('active');
        }
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    }

    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);
  </script>

</body>
</html>

</body>
</html>


<img src="images/chair.png" alt="Chair" style="width: 100vw; height: 80vh; object-fit: cover;">

<section class="bg-gray-100">
  <div class="container mx-auto py-16">
    <h2 class="text-3xl font-bold text-center mb-8">New Arrivals</h2>
    <p class="text-center text-gray-500 mb-8">Whether you are aiming for a particular aesthetic, working with a fixed budget or simply want an expert’s guidance to create the home of your dreams, Finez is ready to make the journey with you, and redefine your space..</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/4.jpg" alt="Lamp Bed" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Lamp Bed</h3>
          <p class="text-gray-500">
            $155.00
            <span class="text-red-500">-6%</span>
          </p>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/1.jpg" alt="Modern Bedroom Storage" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Modern Bedroom Storage</h3>
          <p class="text-gray-500">
            $140.00
            <span class="text-red-500">-33%</span>
          </p>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/2.jpg" alt="Bobber Table Lamp" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Bobber Table Lamp</h3>
          <p class="text-gray-500">
            $285.00
            <span class="text-red-500">OUT OF STOCK</span>
          </p>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/3.jpg" alt="Arne Dining Chair" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Arne Dining Chair</h3>
          <p class="text-gray-500">
            $257.00
          </p>
        </div>
      </div>
    </div>
  </div>
  
</section>  
       
<section class="bg-gray-100">
  <div class="container mx-auto py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/5.jpg" alt="Bollard Lamp" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Bollard Lamp</h3>
          <p class="text-gray-500">
            <span class="line-through text-gray-400">$160.00</span>
            <span class="text-green-500">$140.00</span>
            <span class="text-red-500">-6%</span>
          </p>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/6.jpg" alt="Norm Stone Lamp" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Norm Stone Lamp</h3>
          <p class="text-gray-500">
            <span class="line-through text-gray-400">$180.00</span>
            <span class="text-green-500">$120.00</span>
            <span class="text-red-500">-33%</span>
          </p>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/7.jpg" alt="Carolyn Solid Wood Cabinet" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Carolyn Solid Wood Cabinet</h3>
          <p class="text-gray-500">$257.00</p>
        </div>
      </div>
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="images/8.jpg" alt="Bedside Side Table Storage" class="w-full h-50 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Bedside Side Table Storage</h3>
          <p class="text-gray-500">$168.00</p>
        </div>
      </div>
    </div>
    <div class="h-screen bg-center bg-no-repeat image-section" style="background-image: url('images/mid.png');"></div>

    </div>
<section class="py-4">
  <div class="max-w-xl mx-auto">
    <div class="text-center">
      <div class="relative flex flex-col items-center">
        <h1 class="text-5xl font-bold text-black">FEATURED PRODUCTS<span class="text-black-500"></span></h1>
        <div class="flex w-40 mt-1 mb-1s overflow-hidden rounded">
          <div class="flex-1 h-1 bg-yellow-200"></div> <!-- Changed bg-blue-200 to bg-yellow-200 -->
          <div class="flex-1 h-2 bg-yellow-400"></div> <!-- Changed bg-blue-400 to bg-yellow-400 -->
          <div class="flex-1 h-2 bg-yellow-600"></div> <!-- Changed bg-blue-600 to bg-yellow-600 -->
        </div>
      </div>
      <p class="mb-8 text-base text-center text-black">Check our Instagram for your daily dose of fresh interior inspiration. Don’t forget to follow us!</p>
    </div>
  </div>
  <div class="justify-center max-w-6xl px-2 py-2 mx-auto lg:py-0">
    <div class="grid grid-cols-1 gap-1 lg:grid-cols-1 md:grid-cols-1">
      <!-- Content for the products goes here -->
    </div>
  </div>
</section>

<!-- Product Cards -->
</div>
</section>

</section>


{{--Brands--}}

  <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2">

      <div class="bg-white rounded-lg shadow-md dark:bg-gray-800">
        <a href="" class="">
          <img src="images/bed.jpg" alt="" class="object-cover w-full h-64 rounded-t-lg">
        </a>
        <div class="p-5 text-center">
          <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
           Sofa
          </a>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md dark:bg-gray-800">
        <a href="" class="">
          <img src="images/chair.jpg" alt="" class="object-cover w-full h-64 rounded-t-lg">
        </a>
        <div class="p-5 text-center">
          <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
            chair
          </a>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md dark:bg-gray-800">
        <a href="" class="">
          <img src="images/lamp.avif" alt="" class="object-cover w-full h-64 rounded-t-lg">
        </a>
        <div class="p-5 text-center">
          <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
            accessories
          </a>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md dark:bg-gray-800">
        <a href="" class="">
          <img src="images/sofa.jpeg" alt="" class="object-cover w-full h-64 rounded-t-lg">
        </a>
        <div class="p-5 text-center">
          <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
            Bed
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


{{--Customer Review--}}
<section class="py-14 font-poppins dark:bg-gray-800">
  <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
    <div class="max-w-xl mx-auto">
      <div class="text-center ">
        <div class="relative flex flex-col items-center">
          <h1 class="text-5xl font-bold dark:text-gray-200"> Customer <span class="text-blue-500"> Reviews
            </span> </h1>
          <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
          <div class="flex-1 h-1 bg-yellow-200"></div> <!-- Changed bg-blue-200 to bg-yellow-200 -->
          <div class="flex-1 h-2 bg-yellow-400"></div> <!-- Changed bg-blue-400 to bg-yellow-400 -->
          <div class="flex-1 h-2 bg-yellow-600">
            </div>
          </div>
        </div>
        <p class="mb-12 text-base text-center text-gray-500">
          got the best sofa 
        </p>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 ">
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0 ">
            <div class="flex mr-2 rounded-full">
              <img src="https://i.postimg.cc/rF6G0Dh9/pexels-emmy-e-2381069.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                Adren Roy</h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">Web Designer</p>
            </div>
          </div>
          <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Joined 12, SEP , 2022
          </p>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
         The bed was so good
        </p>
        <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
          <div class="flex px-6 mb-2 md:mb-0">
            <ul class="flex items-center justify-start mr-4">
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
            </ul>
            <h2 class="text-sm text-gray-500 dark:text-gray-400">Rating:<span class="font-semibold text-gray-600 dark:text-gray-300">
                3.0</span>
            </h2>
          </div>
          <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
            <div class="flex items-center">
              <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                    </path>
                  </svg>
                </a>
                <span>12</span>
              </div>
              <div class="flex text-sm text-gray-700 dark:text-gray-400">
                <a href="#" class="inline-flex hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                    </path>
                  </svg>Reply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0 ">
            <div class="flex mr-2 rounded-full">
              <img src="https://i.postimg.cc/q7pv50zT/pexels-edmond-dant-s-4342352.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                Sonira Roy</h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">Manager</p>
            </div>
          </div>
          <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Joined 12, SEP , 2022
          </p>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
  Sofasy is the best
        </p>
        <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
          <div class="flex px-6 mb-2 md:mb-0">
            <ul class="flex items-center justify-start mr-4">
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
            </ul>
            <h2 class="text-sm text-gray-500 dark:text-gray-400">Rating:<span class="font-semibold text-gray-600 dark:text-gray-300">
                3.0</span>
            </h2>
          </div>
          <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
            <div class="flex items-center">
              <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                    </path>
                  </svg></a>
                <span>12</span>
              </div>
              <div class="flex text-sm text-gray-700 dark:text-gray-400">
                <a href="#" class="inline-flex hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                    </path>
                  </svg>Reply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0 ">
            <div class="flex mr-2 rounded-full">
              <img src="https://i.postimg.cc/JzmrHQmk/pexels-pixabay-220453.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                William harry</h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">Marketing Officer</p>
            </div>
          </div>
          <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Joined 12, SEP , 2022
          </p>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
            It is just the best go to place
        </p>
        <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
          <div class="flex px-6 mb-2 md:mb-0">
            <ul class="flex items-center justify-start mr-4">
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
            </ul>
            <h2 class="text-sm text-gray-500 dark:text-gray-400">Rating:<span class="font-semibold text-gray-600 dark:text-gray-300">
                3.0</span>
            </h2>
          </div>
          <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
            <div class="flex items-center">
              <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                    </path>
                  </svg></a>
                <span>12</span>
              </div>
              <div class="flex text-sm text-gray-700 dark:text-gray-400">
                <a href="#" class="inline-flex hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                    </path>
                  </svg>Reply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0 ">
            <div class="flex mr-2 rounded-full">
              <img src="https://i.postimg.cc/4NMZPYdh/pexels-dinielle-de-veyra-4195342.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                James jack</h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">Java Programmer</p>
            </div>
          </div>
          <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Joined 12, SEP , 2022
          </p>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
         i luv the furnitures
        </p>
        <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
          <div class="flex px-6 mb-2 md:mb-0">
            <ul class="flex items-center justify-start mr-4">
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-blue-500 dark:text-blue-400 bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                    </path>
                  </svg>
                </a>
              </li>
            </ul>
            <h2 class="text-sm text-gray-500 dark:text-gray-400">Rating:<span class="font-semibold text-gray-600 dark:text-gray-300">
                3.0</span>
            </h2>
          </div>
          <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
            <div class="flex items-center">
              <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                    </path>
                  </svg></a>
                <span>12</span>
              </div>
              <div class="flex text-sm text-gray-700 dark:text-gray-400">
                <a href="#" class="inline-flex hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-blue-400 bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                    </path>
                  </svg>Reply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
