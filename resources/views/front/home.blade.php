@php
    $title = 'Home';
@endphp
<x-front_header :title="$title" />
<!-- main body -->
<style>
@media (max-width: 1024px) {
    div#cm-title .horizental-line {
    border-bottom: 1px solid #fe6700;
    margin-top: -21px !important;
    width: 83%;
    margin: auto;
}
}
@media (max-width: 700px) {
    div#cm-title .horizental-line {
    border-bottom: 1px solid #fe6700;
    margin-top: -20px !important;
    width: 100%;
    margin: auto;
}
}
</style>
<div class="main-banner"></div>
<div class="main text-center">
<a href="{{url('/')}}/book-a-lane?date=<?php echo date('Y-m-d');?>">Book Now</a>
</div>

<!--<section class="EXPERIENCE">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 EXPERIENCE-images">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <img src="category_icon/about1.png" width="auto">
                    </div>
                    <div class="col-lg-6 col-6" style="margin-top:50px;">
                        @if(isset($whoweare[0]))
                        <img src="{{$whoweare[0]->page_image}}" width="auto">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 ps-5" id="EXPERIENCE-LEFT-PART">
                <div class="box-sub mb-2">EXPERIENCE</div>
                <h2 class="p-0 desktop-title font-weight-bold">Who We Are ?</h2> 
                <h2 class="p-0 d-none mob-title">@if(isset($whoweare[0])) {{$whoweare[0]->page_name}}@endif</h2>
               @if(isset($whoweare[0])) {!!$whoweare[0]->page_description!!}@endif
                <a href="#" class="btn custom-btn">CONTINUE READING

                    <svg class="ms-3" xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 14 10" fill="none">
                        <path d="M1 5H13M13 5L9 1M13 5L9 9" stroke="white" stroke-width="1.25" stroke-linecap="round"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>-->
<style>
   h1 {
   width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 20px; 
  
} 

h1 span { 
    background:#fff; 
    padding:0 10px;
    color: #ff6700; 
}
</style>


{{-- Why Choose Us --}}
<section class="why-choose-us">
    
    <div class="container">
        <div class="row">
           
                
                <h1 class="p-0 text-center" id="latest-news-title"><span>Latest News</span></h1>
                
    
        <div class="slide-container" id="grid-card">
             <!-- Slides for each year -->
            @if($cricademia_achievements)
            @php 
            $count=0;
            @endphp
            @foreach($cricademia_achievements as $achivement)
            @php 
            $count++;
            $display="block";
            if($count>3){
                $display="none";
            }
            @endphp
            @if($achivement->image)
            <div class="card" style="display:<?php echo $display;?>">
                <div class="row g-0">
                    <div class="col-lg-4 featured_image" >
                        <div class="image-block h-100">
                        <img src="{{asset('page_image')}}/{{$achivement->image}}">
                    </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center p-5 p-s-0">
                        <div>
                            <h2 class="card-title">{{$achivement->heading}}</h2>
                            <p class="card-text">{!! $achivement->description !!}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            @else
            <div class="card" style="display:{{ $display }};">
                    <div class="row">
                        <div class="col-lg-12 col-12 p-5 p-s-0 text-center">
                            <h2 class="text-center">{{ $achivement->heading }}</h2>
                            {!! $achivement->description !!}
                        </div>
                    </div>
                </div>
            @endif
            
            @endforeach
            @endif
           
            @if($count>3)
            <div class="text-left LoadMore" style="padding-left:20px;" >
                <a onclick="show_div()" href="javascript:void(0)">Load More</a>
            </div>
            @endif
            <!--<div class="slide">
                <div class="text-block">
                    <h2>Cricademia Sign Long Term Contract With Scarcroft, 2024 </h2>
                    <p>Scarcroft based in Leeds, has agreed a long term deal to establish a junior section with a 2 pronged approach. Our aim is to recruit children of all ages and abilities to enjoy the game and identify those with talent for next level/stage of their development. We aim to achieve this by developing a performance pathways program within Scarcrofts junior section. This will allow us to work closely with children that possess the ability to go onto play regional/county. This is going to be an amazing program to develop children to the highest level of achievement.</p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/Cricademia-Sign-Long-Term-Contract-With-Scarcroft-2024.jpg">
                </div>
            </div>
            <div class="slide">
                <div class="text-block">
                    <h2>Academy Director, Highly Commended at Leeds Sports Awards, 2023 </h2>
                    <p>Congratulations to our academy director Ghulam Rafique, Awarded highly Commended at the Leeds Sports Awards Last Night.                                                                                                                                                                         <strong> “Congratulations to all of the award winners. Ghulam with his award here! Very proud of the great work he's been doing with the junior section!” – New Rover CC</strong></p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/Leeds-Sports-Awards-2022.png">
                </div>
            </div>
            <div class="slide">
                <div class="text-block">
                    <h2>Yorkshire Champions 2023</h2>
                    <p>New Rovers girls u13 managed by the coaching staff at cricademia won the Yorkshire finals of the ECB Vitality national T20 competition. A great day for all that have worked hard behind the scenes to establish a strong team of talent young girls cricketeers. Well done!!                                                                                                                          <strong> “Fantastic achievement” – New Rover CC</strong></p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/9-Yorkshire-U13s.png">
                </div>
            </div>
            <div class="slide">
                <div class="text-block">
                    <h2>New Rovers CC U13’s Highly Commended At Leeds Sports Awards, 2022 </h2>
                    <p>Big Congratulations to our U13’s at the Leeds sports awards with new rover winning highly recommended team award. Fantastic night to mark end of an amazing season for New Rover CC and Cricademia Academy. Both academy director and performance lead coach Mustafa and Ghulam had the pleasure of enjoying the evening with the team!                                                                                                                                                                                   <strong> “Very proud of our juniors after last year's unbelievable season - our U13s side highly commended at the Leeds Sports Awards for the U18 category! And here's a few of our lads with coach Ghulam Rafique at the event last night - another fabulous achievement for our youngsters!” - New Rover</strong>  </p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/4-New-Rover-Girls-Yorkshire-Champions-2023.png">
                </div>
            </div>
            <div class="slide">
                <div class="text-block">
                    <h2>With Cricademia Academy, New Rovers CC Reach ECB National Finals, 2022                                                                        </h2>
                    <p>Powered by Cricademia and led by Rovers Academy Director Ghulam Rafique & Lead High Performance Coach Mustafa New Rover with the U13’s & U15’s achieved a truly amazing journey to reach the finals of ECB National Vitality Club Competition in 2022. This was a momentous journey with over 1600 clubs participating in each age group nationally. We would like to thank all the players that took part in the competition and more importantly for unequivocal support from the parents in what was a long journey up and down the country. </p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/With-Cricademia-Academy-New-Rovers-C- Reach-ECB-National-Finals,-2022.jpg
">
                </div>
            </div>
            <div class="slide">
                <div class="text-block">
                    <h2>Cricadmeia Partners With Pudsey Congs December, 2022                                                                                                                                         </h2>
                    <p>Cricademia is proud to announce we will be partnering with Pudsey Congs to establish a junior section. Pudsey Congs is arguably one of the best premier cricket clubs in Yorkshire with ground and facilities second to none. It is therefore a great pleasure to agree a long term partnership agreement to start a new junior section. The junior section will train and play games under the banner of Cricademia Congs for 2023 season and beyond.</p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/Cricadmeia-Partners-With-Pudse-Congs-December-2022.jpg
">
                </div>
            </div>
            <div class="slide">
                <div class="text-block">
                    <h2>Ghulam Rafique Coach Of The Year by ECB, 2021                                                                                                                                        </h2>
                    <p>Academy Director Ghulam Rafique receives ‘Maurice Young Award’ from ECB, for his commitment to New Rover CC. 8 years ago New Rover CC had no Junior Section. Ghulam worked to develop a ‘high performance’ coaching programme with over 30 valued members, for New Rover CC’s county and regional age group.                                                                                                                                                <strong>“Ghulam Rafique has helped to transform New Rover CC's junior programme which now runs through the winter and flourishes during the summer. The club’s under 13s and 15s teams were both crowned Yorkshire champions in the ECB Vitality Cup competition last summer and Ghulam’s involvement at the Leeds-based club has been transformative.” – ECB</strong> </p>
                </div>
                <div class="image-block">
                    <img src="https://web.cricademia.com/assets/images/ECB-AWARDS.png
">
                </div>
            </div>-->
    </div>
    <!--<div class="controls">-->
    <!--    <button class="prev" onclick="moveSlide(-1)">Prev</button>-->
    <!--    <button class="next" onclick="moveSlide(1)">Next</button>-->
    <!--</div>-->
</div>
</div>
</div>
</div>
</section>      
<!-- testmonial -->
<!--<section class="testmonial">
    <div class="container">
    <div class="main-title " id="cm-title">
        <h1><span>What our customer’s say</span></h1>
        <div class="horizental-line"></div>
    </div>
        <div class="row text-center">
            

        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="testmonial2">
                <div class="slider-item ">
                    <div class="p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 align-items-center justify-content-between">
                                    <h5 class="card-title">Humza Rafique</h5>
                                    <svg width="46" height="33" viewBox="0 0 46 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 33L14 0H23.5L14 33H0Z" fill="#ACACAC" />
                                        <path d="M22 33L36 0H45.5L36 33H22Z" fill="#ACACAC" />
                                        <path d="M0 33L14 0H23.5L14 33H0Z" fill="#D7D7D7" />
                                        <path d="M22 33L36 0H45.5L36 33H22Z" fill="#D7D7D7" />
                                    </svg>
                                </div>
                                <p class="card-text pt-2">The coaches at Cricademia are highly knowledgeable. They have been on hand at every moment to help me improve my cricket in all aspects.</p>
                                <svg width="106" height="18" viewBox="0 0 106 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.4386 7.58384C18.2219 7.0368 17.819 5.84666 16.8505 5.84666H13.0458C12.173 5.84666 11.401 5.30307 11.1384 4.50364L9.87987 0.671511C9.58587 -0.223837 8.26657 -0.223837 7.97247 0.671511L6.714 4.50364C6.45146 5.30307 5.67944 5.84666 4.80662 5.84666H1.00192C0.0333899 5.84666 -0.36952 7.0368 0.41383 7.58384L3.80239 9.95016C4.5347 10.4615 4.81793 11.3816 4.4929 12.1932L3.02289 15.8637C2.66525 16.7568 3.73872 17.5479 4.54441 16.9852L7.74987 14.7463C8.45117 14.2564 9.40127 14.2564 10.1026 14.7463L13.308 16.9852C14.1137 17.5479 15.1872 16.7568 14.8295 15.8637L13.3595 12.1932C13.0345 11.3816 13.3177 10.4615 14.05 9.95016L17.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M39.4386 7.58384C40.2219 7.0368 39.819 5.84666 38.8505 5.84666H35.0458C34.173 5.84666 33.401 5.30307 33.1384 4.50364L31.8799 0.671511C31.5859 -0.223837 30.2666 -0.223837 29.9725 0.671511L28.714 4.50364C28.4515 5.30307 27.6794 5.84666 26.8066 5.84666H23.0019C22.0334 5.84666 21.6305 7.0368 22.4138 7.58384L25.8024 9.95016C26.5347 10.4615 26.8179 11.3816 26.4929 12.1932L25.0229 15.8637C24.6652 16.7568 25.7387 17.5479 26.5444 16.9852L29.7499 14.7463C30.4512 14.2564 31.4013 14.2564 32.1026 14.7463L35.308 16.9852C36.1137 17.5479 37.1872 16.7568 36.8295 15.8637L35.3595 12.1932C35.0345 11.3816 35.3177 10.4615 36.05 9.95016L39.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M61.4386 7.58384C62.2219 7.0368 61.819 5.84666 60.8505 5.84666H57.0458C56.173 5.84666 55.401 5.30307 55.1384 4.50364L53.8799 0.671511C53.5859 -0.223837 52.2666 -0.223837 51.9725 0.671511L50.714 4.50364C50.4515 5.30307 49.6794 5.84666 48.8066 5.84666H45.0019C44.0334 5.84666 43.6305 7.0368 44.4138 7.58384L47.8024 9.95016C48.5347 10.4615 48.8179 11.3816 48.4929 12.1932L47.0229 15.8637C46.6652 16.7568 47.7387 17.5479 48.5444 16.9852L51.7499 14.7463C52.4512 14.2564 53.4013 14.2564 54.1026 14.7463L57.308 16.9852C58.1137 17.5479 59.1872 16.7568 58.8295 15.8637L57.3595 12.1932C57.0345 11.3816 57.3177 10.4615 58.05 9.95016L61.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M83.4386 7.58384C84.2219 7.0368 83.819 5.84666 82.8505 5.84666H79.0458C78.173 5.84666 77.401 5.30307 77.1384 4.50364L75.8799 0.671511C75.5859 -0.223837 74.2666 -0.223837 73.9725 0.671511L72.714 4.50364C72.4515 5.30307 71.6794 5.84666 70.8066 5.84666H67.0019C66.0334 5.84666 65.6305 7.0368 66.4138 7.58384L69.8024 9.95016C70.5347 10.4615 70.8179 11.3816 70.4929 12.1932L69.0229 15.8637C68.6652 16.7568 69.7387 17.5479 70.5444 16.9852L73.7499 14.7463C74.4512 14.2564 75.4013 14.2564 76.1026 14.7463L79.308 16.9852C80.1137 17.5479 81.1872 16.7568 80.8295 15.8637L79.3595 12.1932C79.0345 11.3816 79.3177 10.4615 80.05 9.95016L83.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M105.439 7.58384C106.222 7.0368 105.819 5.84666 104.85 5.84666H101.046C100.173 5.84666 99.401 5.30307 99.1384 4.50364L97.8799 0.671511C97.5859 -0.223837 96.2666 -0.223837 95.9725 0.671511L94.714 4.50364C94.4515 5.30307 93.6794 5.84666 92.8066 5.84666H89.0019C88.0334 5.84666 87.6305 7.0368 88.4138 7.58384L91.8024 9.95016C92.5347 10.4615 92.8179 11.3816 92.4929 12.1932L91.0229 15.8637C90.6652 16.7568 91.7387 17.5479 92.5444 16.9852L95.7499 14.7463C96.4512 14.2564 97.4013 14.2564 98.1026 14.7463L101.308 16.9852C102.114 17.5479 103.187 16.7568 102.829 15.8637L101.359 12.1932C101.034 11.3816 101.318 10.4615 102.05 9.95016L105.439 7.58384Z"
                                        fill="#FFBA09" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 align-items-center justify-content-between">
                                    <h5 class="card-title">Naren G</h5>
                                    <svg width="46" height="33" viewBox="0 0 46 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 33L14 0H23.5L14 33H0Z" fill="#ACACAC" />
                                        <path d="M22 33L36 0H45.5L36 33H22Z" fill="#ACACAC" />
                                        <path d="M0 33L14 0H23.5L14 33H0Z" fill="#D7D7D7" />
                                        <path d="M22 33L36 0H45.5L36 33H22Z" fill="#D7D7D7" />
                                    </svg>
                                </div>
                                <p class="card-text pt-2">Excellent coaching by Ghulam and Mustafa. Great place for indoor training during winter. Enough parking inside and on the street when needed, kids enjoy this place.</p>
                                <svg width="106" height="18" viewBox="0 0 106 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.4386 7.58384C18.2219 7.0368 17.819 5.84666 16.8505 5.84666H13.0458C12.173 5.84666 11.401 5.30307 11.1384 4.50364L9.87987 0.671511C9.58587 -0.223837 8.26657 -0.223837 7.97247 0.671511L6.714 4.50364C6.45146 5.30307 5.67944 5.84666 4.80662 5.84666H1.00192C0.0333899 5.84666 -0.36952 7.0368 0.41383 7.58384L3.80239 9.95016C4.5347 10.4615 4.81793 11.3816 4.4929 12.1932L3.02289 15.8637C2.66525 16.7568 3.73872 17.5479 4.54441 16.9852L7.74987 14.7463C8.45117 14.2564 9.40127 14.2564 10.1026 14.7463L13.308 16.9852C14.1137 17.5479 15.1872 16.7568 14.8295 15.8637L13.3595 12.1932C13.0345 11.3816 13.3177 10.4615 14.05 9.95016L17.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M39.4386 7.58384C40.2219 7.0368 39.819 5.84666 38.8505 5.84666H35.0458C34.173 5.84666 33.401 5.30307 33.1384 4.50364L31.8799 0.671511C31.5859 -0.223837 30.2666 -0.223837 29.9725 0.671511L28.714 4.50364C28.4515 5.30307 27.6794 5.84666 26.8066 5.84666H23.0019C22.0334 5.84666 21.6305 7.0368 22.4138 7.58384L25.8024 9.95016C26.5347 10.4615 26.8179 11.3816 26.4929 12.1932L25.0229 15.8637C24.6652 16.7568 25.7387 17.5479 26.5444 16.9852L29.7499 14.7463C30.4512 14.2564 31.4013 14.2564 32.1026 14.7463L35.308 16.9852C36.1137 17.5479 37.1872 16.7568 36.8295 15.8637L35.3595 12.1932C35.0345 11.3816 35.3177 10.4615 36.05 9.95016L39.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M61.4386 7.58384C62.2219 7.0368 61.819 5.84666 60.8505 5.84666H57.0458C56.173 5.84666 55.401 5.30307 55.1384 4.50364L53.8799 0.671511C53.5859 -0.223837 52.2666 -0.223837 51.9725 0.671511L50.714 4.50364C50.4515 5.30307 49.6794 5.84666 48.8066 5.84666H45.0019C44.0334 5.84666 43.6305 7.0368 44.4138 7.58384L47.8024 9.95016C48.5347 10.4615 48.8179 11.3816 48.4929 12.1932L47.0229 15.8637C46.6652 16.7568 47.7387 17.5479 48.5444 16.9852L51.7499 14.7463C52.4512 14.2564 53.4013 14.2564 54.1026 14.7463L57.308 16.9852C58.1137 17.5479 59.1872 16.7568 58.8295 15.8637L57.3595 12.1932C57.0345 11.3816 57.3177 10.4615 58.05 9.95016L61.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M83.4386 7.58384C84.2219 7.0368 83.819 5.84666 82.8505 5.84666H79.0458C78.173 5.84666 77.401 5.30307 77.1384 4.50364L75.8799 0.671511C75.5859 -0.223837 74.2666 -0.223837 73.9725 0.671511L72.714 4.50364C72.4515 5.30307 71.6794 5.84666 70.8066 5.84666H67.0019C66.0334 5.84666 65.6305 7.0368 66.4138 7.58384L69.8024 9.95016C70.5347 10.4615 70.8179 11.3816 70.4929 12.1932L69.0229 15.8637C68.6652 16.7568 69.7387 17.5479 70.5444 16.9852L73.7499 14.7463C74.4512 14.2564 75.4013 14.2564 76.1026 14.7463L79.308 16.9852C80.1137 17.5479 81.1872 16.7568 80.8295 15.8637L79.3595 12.1932C79.0345 11.3816 79.3177 10.4615 80.05 9.95016L83.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M105.439 7.58384C106.222 7.0368 105.819 5.84666 104.85 5.84666H101.046C100.173 5.84666 99.401 5.30307 99.1384 4.50364L97.8799 0.671511C97.5859 -0.223837 96.2666 -0.223837 95.9725 0.671511L94.714 4.50364C94.4515 5.30307 93.6794 5.84666 92.8066 5.84666H89.0019C88.0334 5.84666 87.6305 7.0368 88.4138 7.58384L91.8024 9.95016C92.5347 10.4615 92.8179 11.3816 92.4929 12.1932L91.0229 15.8637C90.6652 16.7568 91.7387 17.5479 92.5444 16.9852L95.7499 14.7463C96.4512 14.2564 97.4013 14.2564 98.1026 14.7463L101.308 16.9852C102.114 17.5479 103.187 16.7568 102.829 15.8637L101.359 12.1932C101.034 11.3816 101.318 10.4615 102.05 9.95016L105.439 7.58384Z"
                                        fill="#FFBA09" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-item">
                    <div class="p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex py-3 align-items-center justify-content-between">
                                    <h5 class="card-title">Michael Coleman</h5>
                                    <svg width="46" height="33" viewBox="0 0 46 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 33L14 0H23.5L14 33H0Z" fill="#ACACAC" />
                                        <path d="M22 33L36 0H45.5L36 33H22Z" fill="#ACACAC" />
                                        <path d="M0 33L14 0H23.5L14 33H0Z" fill="#D7D7D7" />
                                        <path d="M22 33L36 0H45.5L36 33H22Z" fill="#D7D7D7" />
                                    </svg>
                                </div>
                                <p class="card-text pt-2">If I could give 0 stars I would. Travelled 2hrs to have a net with friends and got to a locked door. After a phone call we found out that the building was closed for the weekend and that nobody bothered to tell us.</p>
                                <svg width="106" height="18" viewBox="0 0 106 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.4386 7.58384C18.2219 7.0368 17.819 5.84666 16.8505 5.84666H13.0458C12.173 5.84666 11.401 5.30307 11.1384 4.50364L9.87987 0.671511C9.58587 -0.223837 8.26657 -0.223837 7.97247 0.671511L6.714 4.50364C6.45146 5.30307 5.67944 5.84666 4.80662 5.84666H1.00192C0.0333899 5.84666 -0.36952 7.0368 0.41383 7.58384L3.80239 9.95016C4.5347 10.4615 4.81793 11.3816 4.4929 12.1932L3.02289 15.8637C2.66525 16.7568 3.73872 17.5479 4.54441 16.9852L7.74987 14.7463C8.45117 14.2564 9.40127 14.2564 10.1026 14.7463L13.308 16.9852C14.1137 17.5479 15.1872 16.7568 14.8295 15.8637L13.3595 12.1932C13.0345 11.3816 13.3177 10.4615 14.05 9.95016L17.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M39.4386 7.58384C40.2219 7.0368 39.819 5.84666 38.8505 5.84666H35.0458C34.173 5.84666 33.401 5.30307 33.1384 4.50364L31.8799 0.671511C31.5859 -0.223837 30.2666 -0.223837 29.9725 0.671511L28.714 4.50364C28.4515 5.30307 27.6794 5.84666 26.8066 5.84666H23.0019C22.0334 5.84666 21.6305 7.0368 22.4138 7.58384L25.8024 9.95016C26.5347 10.4615 26.8179 11.3816 26.4929 12.1932L25.0229 15.8637C24.6652 16.7568 25.7387 17.5479 26.5444 16.9852L29.7499 14.7463C30.4512 14.2564 31.4013 14.2564 32.1026 14.7463L35.308 16.9852C36.1137 17.5479 37.1872 16.7568 36.8295 15.8637L35.3595 12.1932C35.0345 11.3816 35.3177 10.4615 36.05 9.95016L39.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M61.4386 7.58384C62.2219 7.0368 61.819 5.84666 60.8505 5.84666H57.0458C56.173 5.84666 55.401 5.30307 55.1384 4.50364L53.8799 0.671511C53.5859 -0.223837 52.2666 -0.223837 51.9725 0.671511L50.714 4.50364C50.4515 5.30307 49.6794 5.84666 48.8066 5.84666H45.0019C44.0334 5.84666 43.6305 7.0368 44.4138 7.58384L47.8024 9.95016C48.5347 10.4615 48.8179 11.3816 48.4929 12.1932L47.0229 15.8637C46.6652 16.7568 47.7387 17.5479 48.5444 16.9852L51.7499 14.7463C52.4512 14.2564 53.4013 14.2564 54.1026 14.7463L57.308 16.9852C58.1137 17.5479 59.1872 16.7568 58.8295 15.8637L57.3595 12.1932C57.0345 11.3816 57.3177 10.4615 58.05 9.95016L61.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M83.4386 7.58384C84.2219 7.0368 83.819 5.84666 82.8505 5.84666H79.0458C78.173 5.84666 77.401 5.30307 77.1384 4.50364L75.8799 0.671511C75.5859 -0.223837 74.2666 -0.223837 73.9725 0.671511L72.714 4.50364C72.4515 5.30307 71.6794 5.84666 70.8066 5.84666H67.0019C66.0334 5.84666 65.6305 7.0368 66.4138 7.58384L69.8024 9.95016C70.5347 10.4615 70.8179 11.3816 70.4929 12.1932L69.0229 15.8637C68.6652 16.7568 69.7387 17.5479 70.5444 16.9852L73.7499 14.7463C74.4512 14.2564 75.4013 14.2564 76.1026 14.7463L79.308 16.9852C80.1137 17.5479 81.1872 16.7568 80.8295 15.8637L79.3595 12.1932C79.0345 11.3816 79.3177 10.4615 80.05 9.95016L83.4386 7.58384Z"
                                        fill="#FFBA09" />
                                    <path
                                        d="M105.439 7.58384C106.222 7.0368 105.819 5.84666 104.85 5.84666H101.046C100.173 5.84666 99.401 5.30307 99.1384 4.50364L97.8799 0.671511C97.5859 -0.223837 96.2666 -0.223837 95.9725 0.671511L94.714 4.50364C94.4515 5.30307 93.6794 5.84666 92.8066 5.84666H89.0019C88.0334 5.84666 87.6305 7.0368 88.4138 7.58384L91.8024 9.95016C92.5347 10.4615 92.8179 11.3816 92.4929 12.1932L91.0229 15.8637C90.6652 16.7568 91.7387 17.5479 92.5444 16.9852L95.7499 14.7463C96.4512 14.2564 97.4013 14.2564 98.1026 14.7463L101.308 16.9852C102.114 17.5479 103.187 16.7568 102.829 15.8637L101.359 12.1932C101.034 11.3816 101.318 10.4615 102.05 9.95016L105.439 7.58384Z"
                                        fill="#FFBA09" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>-->

<section class="our-categories">
    <!--<div class="container">
            <h2 class="h2 text-center main-title">Our category</h2>
        </div>-->
    <div class="container-fluid px-5">
        <div class="row justify-content-center">
            <div class="banner-inner1 col-lg-4 col-md-6 col-12 overflow-hidden">
                <a href="{{url('/')}}/book-a-lane?date=<?php echo date('Y-m-d');?>">
                    <div class="banner-inner category-tile border" style="background-image: url('frontend/img/traning_1.png');">
                        <div class="banner-content">
                            <span class="text-1">Book Lane</span>
                            <span class="text-2">Easy To Book Your Timely Lane</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="banner-inner1 col-lg-4 col-md-6 col-12 overflow-hidden">
                <a href="https://web.cricademia.com/events">
                    <div class="banner-inner category-tile border" style="background-image: url('frontend/img/traning_2.jpg');">
                        <div class="banner-content">
                            <span class="text-1">Book Event</span>
                            <span class="text-2">Get Join To Our Event </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<script>
    let slideIndex = 0;
    const slideContainer = document.querySelector('.slide-container');
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function moveSlide(direction) {
        slideIndex = (slideIndex + direction + totalSlides) % totalSlides;
        slideContainer.style.transform = 'translateX(-' + slideIndex * 100 + '%)';
    }

    function show_div(){
       
        $('.card').show();
        $('.LoadMore').hide();
    }
</script>
<!-- main body end -->
<x-front_footer />
