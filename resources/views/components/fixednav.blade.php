<nav id="mainNav" class="bg-white dark:bg-white shadow-md transition-all">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li><a href="#Our_Services" class="text-gray-900 dark:text-white hover:underline">Our Services</a></li>
                <li><a href="#Our_Team" class="text-gray-900 dark:text-white hover:underline">Our Team</a></li>
                <li><a href="#Our_Projects" class="text-gray-900 dark:text-white hover:underline">Our Projects</a></li>

            </ul>
        </div>
    </div>
</nav>

<style>
    .fixed-nav {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999;
}

</style>

<script>
    const nav = document.getElementById("mainNav");
    const navOffset = nav.offsetTop;

    window.addEventListener("scroll", () => {
        if (window.scrollY >= navOffset) {
            nav.classList.add("fixed", "top-0", "left-0", "right-0", "z-50", "bg-white", "shadow-md");
        } else {
            nav.classList.remove("fixed", "top-0", "left-0", "right-0", "z-50");
        }
    });
</script>
