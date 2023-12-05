 <!-- ? section-hero ======== -->
 <section class="w-full mt-[30px] mb-[30px]">
     <div class="main__hero px-3 md:px-0">
         <!-- left -->
         <div class="left__item">
             <h1 class="title font">Penelusuran Alumni</h1>
             <h2 class="subTitle">SMK NEGERI 2 PADANG PANJANG</h2>
             <p class="deskripsi">
                 Bantu kami meningkatkan kualitas pendidikan. Tracer study ,
                 kontribusimu untuk pendidikan dan jendela untuk masa depanmu.
             </p>

             <div class="flex space-x-10 mt-[17px]">
                 <button class="inset-0">
                     <a href="{{ route('search') }}"
                         class="px-6 py-2 text-white rounded-full bg-primary hover:bg-gray-800">Cari
                         Alumni
                     </a>
                 </button>
                 <button>
                     <a href="{{ route('register') }}" class="hero___register">Mendaftar</a>
                 </button>
             </div>

             <div
                 class=" flex mt-[60px] md:mt-[80px] lg:mt-[130px]     space-x-10 md:space-x-[25px] justify-center md:justify-between lg:pr-20    items-center">


                 <div class="flex space-x-10 items-center justify-center">

                     <a href="https://www.instagram.com/smkn2padangpanjang/"><img
                             src=" {{ asset('assets/instagram.svg') }}" alt="instagram" /></a>
                     <a href="https://www.facebook.com/smkn2papa"><img src=" {{ asset('assets/facebook.svg') }}"
                             alt="facebook" /></a>
                     <a href="https://www.youtube.com/@smknegeri2padangpanjang938"><img
                             src=" {{ asset('assets/youtube.svg') }}" alt="youtube" /></a>
                 </div>


             </div>
         </div>

         <!-- right -->
         <div class="right__item">
             <img src="{{ asset('assets/hero.png') }}" alt="hero" class="mt-2 hero__image lg:mt-0" loading="lazy" />
         </div>
     </div>
 </section>
 <!-- ! section-hero ======== -->
