<nav class="
flex flex-wrap
items-center
justify-between
w-full
py-4
md:py-0
px-4
text-lg text-gray-700
bg-white
">
    <div>
        <a href="#" class="text-xl font-mono text-purple-500">
            Job borad
        </a>
    </div>

    <button id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block hover:text-purple-400">
        <i class="fa-solid fa-bars"></i>
    </button>

    <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
        <ul
            class="
  pt-4
  text-base text-gray-700
  md:flex
  md:items-center
  md:justify-between 
  md:py-4
  md:gap-4
  
  ">
            <li class="py-2 md:p-0">
                <a class="  hover:text-purple-400" href="/">Home</a>
            </li>

            <li class="py-2 md:p-0">
                <a class="  hover:text-purple-400" href="/jobs">Jobs</a>
            </li>

            <li class="py-2 md:p-0">
                <a class="  hover:text-purple-400 text-purple-500" href="signup">
                    Sign Up
                </a>
            </li>
            <li class="py-2 md:p-0">
                <a class="px-2 py-1  rounded-md text-white hover:bg-purple-400 bg-purple-500" href="login">
                    Log in
                </a>
            </li>
        </ul>
    </div>
</nav>
<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');
    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
