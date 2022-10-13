<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'sidebar_left.php'; ?>
<main class="bg-sky-100">
    <button id='open-modal-btn' class="hidden text-center mt-1 ml-1 w-[min(110px,80%)] bg-slate-800 rounded-md text-slate-300 ">ingresar</button>
    <button id='logOut-btn' class="hidden text-center mt-1 ml-1 w-[min(110px,80%)] bg-slate-800 rounded-md text-slate-300 ">salir</button>
    <section id="signIn-window" class="w-[min(400px,90%)] h-80 m-auto hidden flex-col justify-center items-center gap-1 p-3 bg-gradient-to-r from-sky-600 to-sky-900 rounded-md shadow-[0_15px_100px_1000px_rgba(0,0,0,0.9)] text-slate-300 fixed z-[2]">
        <span id="close-btn" class="cursor-pointer text-slate-300 text-2xl absolute top-0 right-2">×</span>
        <form class="text-xl text-left w-full flex flex-col justify-center items-center">
            <section id="container-inputs-signIn" class="w-full  flex flex-col justify-center items-center gap-4">
                <div class="w-[min(400px,90%)] flex flex-col justify-between items-center">
                    <label class="duration-150 ease-in-out px-1 w-full" htmlFor="name_login">
                        Email
                    </label>
                    <input id="login-blog-user" class="rounded-md outline-none w-full max-h-6 bg-transparent px-1 border-b-2 border-b-gray-400 text-slate-100" id="name_login" type="text" required />
                </div>
                <div class=" w-[min(400px,90%)] flex flex-col justify-between items-center">
                    <label class="duration-150 ease-in-out px-2 w-full" htmlFor="password_login">
                        Contraseña
                    </label>
                    <input id='login-blog-pass' class="rounded-md outline-none w-full max-h-6 bg-transparent px-1 border-b-2 border-b-gray-400 text-slate-100" id="password_login" type="password" required />
                </div>
            </section>
            <section class="w-full mt-3 flex flex-col justify-center items-center gap-2">
                <button id='blog-signIn' class=" w-[min(200px,75%)] bg-cyan-500 text-slate-300 rounded-md text-xl hover:scale-105 ease-in-out duration-300">
                    Ingresar
                </button>
                <p class="text-lg text-center ">
                    ¿No tiene Cuenta?
                    <span class="cursor-pointer fw-bold hover:text-slate-700 duration-300">
                        ¡Registrese!
                    </span>
                </p>
            </section>
        </form>
    </section>
    <div class="mb-2" id='container-btn-add-blog'></div>
    <div id="container-blogs" class="w-[90%] m-auto grid grid-cols-[repeat(auto-fit,minmax(20rem,1fr))] gap-5 p-[0.25rem_0_1rem_0]"> </div>
    <section class="hidden">
        <form id='formBlog' class="bg-gradient-to-r from-sky-700 to-sky-900 m-auto text-slate-300 w-[500px] flex flex-col justify-center items-start p-[0.75rem_1rem] rounded-md">
            <h1 class="text-center w-full">INGRESO DE BLOG</h1>
            <div class=" flex flex-row justify-between w-full items-center">
                <label> Título del blog </label>
                <input onkeyup="reportValidity()" id="titleFront" class="rounded-md outline-none max-h-6 text-slate-900 px-1 border-b-2 border-b-gray-400 " type="text" required />
            </div>
            <div class=" flex flex-row justify-between w-full items-center">
                <label> Descripción </label>
                <input onkeyup="reportValidity()" id="description" class="rounded-md outline-none max-h-6 text-slate-900 px-1 border-b-2 border-b-gray-400 " type="text" required />
            </div>
            <div class=" flex flex-row justify-between w-full items-center">
                <label> Título que tendra la galeria del blog </label>
                <input onkeyup="reportValidity()" id="titleGallery" class="rounded-md outline-none max-h-6 text-slate-900 px-1 border-b-2 border-b-gray-400 " type="text" required />
            </div>
            <div class=" flex flex-row justify-between w-full items-center">
                <label> ¿Es importante? </label>
                <input id="isImportant" class="rounded-md outline-none h-5 w-5 text-slate-900 px-1 border-b-2 border-b-gray-400 " type="checkbox" />
            </div>
            <div class=" flex flex-col justify-between w-full items-center">
                <label class="bg-cyan-800 text-slate-300 rounded-md text-md hover:scale-105 ease-in-out duration-300 cursor-pointer px-2" for="inputImageFront">Portada del blog</label>
                <input id="inputImageFront" name="inputImageFront" class="hidden rounded-md outline-none w-full max-h-6 text-slate-900 px-1 border-b-2 border-b-gray-400 " type="file" />
            </div>
            <div class=" flex flex-col justify-between w-full items-center">
                <label class="bg-cyan-800 text-slate-300 rounded-md text-md hover:scale-105 ease-in-out duration-300 cursor-pointer px-2" for="inputImageGallery">Imagenes de la Galleria</label>
                <input multiple="multiple" id="inputImageGallery" name="inputImageGallery" class="hidden rounded-md outline-none w-full max-h-6 text-slate-900 px-1 border-b-2 border-b-gray-400 " type="file" />
            </div>
            <div class=" flex flex-col justify-between w-full items-center">
                <button id='btnSaveBlog' class="bg-cyan-900 text-slate-300 rounded-md text-lg hover:scale-105 ease-in-out duration-300 px-2">Ingresar Blog</button>
            </div>
        </form>
        <div id="fileDisplayArea"></div>
    </section>
    <div class="hidden w-full justify-center items-center">
        <button id="testSendImages" class=" bg-black p-2 text-slate-300 rounded-sm text-lg">test</button>
    </div>
</main>
<?php require 'footer.php'; ?>
<script type="module" src="scripts/blogs.js"></script>
<script src="scripts/galeriasCOAC-S.js" type="text/javascript"></script>
<script src="scripts/modalLogin.js" type="text/javascript"></script>
<script type="module" src="scripts/SaveBlog.js"></script>