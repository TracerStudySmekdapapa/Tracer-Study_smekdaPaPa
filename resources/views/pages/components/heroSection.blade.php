 <!-- ? section-hero ======== -->
 <section class="w-full mt-[30px] mb-[30px]">
     <div class="main__hero">
         <!-- left -->
         <div class="left__item">
             <h1 class="title">Penelusuran Alumni</h1>
             <h2 class="subTitle">SMK NEGERI 2 PADANG PANJANG</h2>
             <p class="deskripsi">
                 Bantu kami meningkatkan kualitas pendidikan. Tracer study,
                 kontribusimu untuk pendidikan dan jendela untuk masa depanmu.
             </p>
 
             <div class="flex space-x-10 mt-[17px]">
                 <button class="inset-0">
                     <a href="" class="px-6 py-2  text-white rounded-full bg-primary hover:bg-gray-800">Cari
                         Alumni
                     </a>
                 </button>
                 <button>
                     <a href="" class="hero___register">Mendaftar</a>
                 </button>
             </div>

             <div
                 class="flex mt-[70px] lg:mt-[72px] space-x-10 md:space-x-[25px] justify-center md:justify-start items-center">
                 <a href="instagram"><img src=" {{ asset('assets/instagram.svg') }}" alt="instagram" /></a>
                 <a href="facebook"><img src=" {{ asset('assets/facebook.svg') }}" alt="facebook" /></a>
                 <a href="youtube"><img src=" {{ asset('assets/youtube.svg') }}" alt="youtube" /></a>
             </div>
         </div>

         <!-- right -->
         <div class="right__item">
             <img src="{{ asset('assets/hero.png') }}" alt="hero" class="hero__image" />
         </div>
     </div>
 </section>
 <!-- ! section-hero ======== -->
