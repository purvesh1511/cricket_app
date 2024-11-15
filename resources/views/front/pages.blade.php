@php
    $title = 'Home';
    function truncateText($text, $limit = 80) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
    $description = "simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurie printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurie";
@endphp
<x-front_header :title="$title" />
<!--main section start-->

<div class="container-fluid p-0 m-0 mb-5">
    <img  src="frontend/img/meet-coaches.jpeg" alt="meet-coaches" width="100%" height="auto" />
</div>
<div class="container main-content pt-2">
    {!!$meet_the_coach->page_description!!}
</div>
<div class="container-fluid py-5" id="cc">
     <div class="row m-auto w-70" id="coching-helping">
        <h1 class="h2 text-center py-3" >Why is Coaching Helpful?</h1>
        <p>
<strong>Personalized Guidance:</strong> Coaching provides tailored advice specific to individual needs and goals.
</p>
            
<p>
    <strong>Skill Development:</strong> Coaches help develop new skills and improve existing ones, enhancing overall performance.
    </p>

<p>
    <strong>Goal Setting and Achievement:</strong> Coaches assist in setting realistic and attainable goals and provide strategies to achieve them.
    </p>
<p>
    <strong>Accountability:</strong> Regular sessions with a coach ensure accountability and motivation to stay on track.
</p>
<p>
    <strong>Confidence Building:</strong> Coaching helps build self-confidence through constructive feedback and support.
</p>

<p>
    <strong>Overcoming Obstacles:</strong> Coaches provide tools and techniques to overcome personal and professional challenges.
</p>

<p>
    <strong>Enhanced Decision Making:</strong> Coaching improves decision-making skills by offering new perspectives and insights.
</p>
<p>
    <strong>Stress Reduction:</strong> Coaches help manage stress by teaching effective stress management and relaxation techniques.
</p>
<p>
<strong>Career Advancement:</strong> Coaching can lead to career growth by identifying and leveraging strengths and addressing areas of improvement.
</p>
</div>
</div>

<!--main section end-->
<x-front_footer />

<script>
    function toggleText(button) {
        const cardBody = button.parentElement;
        const shortText = cardBody.querySelector('.short-text');
        const fullText = cardBody.querySelector('.full-text');
        
        if (shortText.classList.contains('d-none')) {
            shortText.classList.remove('d-none');
            fullText.classList.add('d-none');
            button.textContent = 'View More';
        } else {
            shortText.classList.add('d-none');
            fullText.classList.remove('d-none');
            button.textContent = 'View Less';
        }
    }
</script>