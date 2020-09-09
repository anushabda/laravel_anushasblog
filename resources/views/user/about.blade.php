@extends('user/app')
@section('title','anushas blog')
@section('headsection')
<link rel="stylesheet" href="{{asset('/user/css/about.css')}}">
@endsection

@section('main-content')
<!-- Profile Data-->
<div class="card pb-4" style="height:400px;background-color:#330000">
  <div class="card-body">
<div class="row">
<div class="col-sm-6">
</div>


  <div class="col-sm-6">
    <img class="card-img-top img-fluid m0 p0" style="object-fit: none; /* Do not scale the image */
    object-position: center; /* Center the image within the element */
    width: 100%;

    max-height: 350px;
    " src="{{ asset('user/images/profilepicbg.jpg') }}" alt="Profile picture" >
  </div>
  <div class="card-img-overlay  d-flex flex-column justify-content-center align-content-center ">
<center>
      <h1 style="font-size:6vw" class=" text-white  display-2 font-weight-bolder flex-item" >Anusha Devasahayam</h1><br><hr>
    <h3 style="font-size:4vw" class="text-white font-weight-bolder flex-item">Web Developer<small class="font-italic"></small></h3>
  </center>
  <h5 class="row  mt-auto d-flex   justify-content-around" style="color:LightSalmon"><div class="flex-item">LEARN To grow </div><div class="flex-item">LEARN To Reap</div><div class="flex-item"> LEARN To Invent</div></div></h5>




    </div>

    </div>
  <!--
  <p class="card-text">Some example text some example text. Some example text some example text. Some example text some example text. Some example text some example text.</p>
  <a href="#" class="btn btn-primary">See Profile</a>-->

      </div>
      </div><!--End Profile Data -->
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <div class="row jumbotron" style="background-color:Bisque;color:#330000">
            Enthusiastic Web Developer fascinated by programming. Seeking to use proven skills in teamwork, leadership and coding. Automised the Result Analysis Report for students' semester results in Excel. Guided students in programming to develop their Image Watermarking project using Matlab.  </div>
            </div>
<div class="row">

<div class="container bgroad">
              <h5  class="font-weight-bolder" style="text-shadow:3px 3px #330000;color:LightSalmon"> The Road Taken <span><i class="fas fa-graduation-cap"></i></span></h5>
              <img  src="{{ asset('images/careerpath.png')}}" alt="career path" style="opacity:0.5"/>

          </div>
        </div>
          </div>
        </div>
      </div>

<div class="container">
  <div class="row d-flex justify-content-center">

    <div class="  col-3 col-md-1 d-flex flex-wrap align-content-center">
      <h5  class="font-weight-bolder inline" style="text-shadow:2px 2px LightSalmon;color:#330000">Technical Skills</h5>
    </div>
    <div class=" col-9  col-md-2  d-flex flex-wrap align-content-center">

        <img src="{{asset('/user/images/skills.jpg')}}" alt="skills" style="width:200px" />
    </div>
    <div class="col-12 col-md-7 " id="skills">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="300" viewBox="0 0 1080 427">

  <defs>
    <style>
      .cls-1 {
        clip-path: url(#clip-Artboard_1);
      }

      .cls-2 {
        fill: none;
      }

      .cls-2, .cls-3 {
        stroke: #707070;
      }

      .cls-4, .cls-5, .cls-6 {
        fill: bisque;
        font-size: 20px;
      }

      .cls-4 {
        font-family: SegoeUI, Segoe UI;
      }

      .cls-5, .cls-6 {
        font-family: SegoeUI-Bold, Segoe UI;
        font-weight: 700;
      }

      .cls-6 {
        letter-spacing: 0.002em;
      }

      .cls-7 {
        fill: #fff;
      }
    </style>
    <clipPath id="clip-Artboard_1">
      <rect width="1080" height="427"/>
    </clipPath>
  </defs>
  <g id="Artboard_1" data-name="Artboard – 1" class="cls-1">
    <rect class="cls-7" width="1080" height="427"/>
    <path id="Path_1" data-name="Path 1" class="cls-2" d="M583.293,320.532c74.542-18.636,59.634,26.09,59.634,26.09s-44.725,58.7-59.634,89.451,0,33.544,0,33.544,3.727,61.031,50.316,48.452S769.649,419.3,769.649,419.3l67.088-55.907s62.429-45.191,109.95-55.907,68.486-6.057,80.133,13.045-10.25,31.68-33.544,63.361-55.441,32.146-59.634,63.361,8.852,50.316,42.862,61.5,93.178-16.772,93.178-16.772l89.451-72.679s50.782-62.895,87.587-87.587,59.634-11.181,59.634-11.181" transform="translate(-388 -208)"/>
    <g id="Component_1_1" data-name="Component 1 – 1" transform="translate(81.616 93.845)">
      <path id="Path_2" data-name="Path 2" class="cls-2" d="M469.616,383.893s39.135-44.725,113.677-63.361,59.634,26.09,59.634,26.09-44.725,58.7-59.634,89.451,0,33.544,0,33.544.928,15.2,7.75,29.071c6.642,13.51,19.225,25.684,42.566,19.382C680.2,505.49,769.649,419.3,769.649,419.3l67.088-55.907s62.429-45.191,109.95-55.907,68.486-6.057,80.133,13.045-10.25,31.68-33.544,63.361-55.441,32.146-59.634,63.361,8.852,50.316,42.862,61.5,93.178-16.772,93.178-16.772l89.451-72.679s50.782-62.895,87.587-87.587" transform="translate(-469.616 -301.845)"/>
    </g>
    <g id="Component_1_2" data-name="Component 1 – 2" transform="translate(81.616 90.574)">
      <path id="Path_2-2" data-name="Path 2" class="cls-2" d="M469.616,383.893s42.156-44.725,122.454-63.361c5.975-1.387-16.4,25.607-17.367,53.347s11.4,41.927,13.491,57.613c4.01,30.138,8.755,60.647,12.224,67.2,7.155,13.51,20.709,25.684,45.852,19.382C696.457,505.49,792.814,419.3,792.814,419.3l72.268-55.907s67.249-45.191,118.439-55.907c-8.025-1.023-11.269,7.627-24.63,13.684s-24.284,19.932-25.619,33.21c-3.513,34.942,3.98,63.138,27.516,98.205,3.459,5.154,6.295,9.765,8.9,14.2,3.42,5.824,6.163,10.966,8.8,15.462,7.482,12.751,13.778,19.369,37.151,26.5,36.636,11.181,100.372-16.772,100.372-16.772l96.357-72.679s54.7-62.895,94.35-87.587" transform="translate(-469.616 -205.574)"/>
      <line id="Line_1" data-name="Line 1" class="cls-2" x2="1" y2="89" transform="translate(25.884 58.926)"/>
      <line id="Line_3" data-name="Line 3" class="cls-2" x2="1" y2="89" transform="translate(164.884 220.926)"/>
      <line id="Line_4" data-name="Line 4" class="cls-2" x2="1" y2="89" transform="translate(231.884 180.926)"/>
      <line id="Line_5" data-name="Line 5" class="cls-2" x2="1" y2="89" transform="translate(275.884 144.926)"/>
      <line id="Line_6" data-name="Line 6" class="cls-2" x2="1" y2="89" transform="translate(348.884 81.926)"/>
      <line id="Line_7" data-name="Line 7" class="cls-2" x2="1" y2="89" transform="translate(384.884 53.926)"/>
      <line id="Line_8" data-name="Line 8" class="cls-2" x2="1" y2="89" transform="translate(492.884 9.926)"/>
      <line id="Line_9" data-name="Line 9" class="cls-2" x2="1" y2="89" transform="translate(524.884 216.926)"/>
      <line id="Line_11" data-name="Line 11" class="cls-2" y2="70" transform="translate(586.884 216.926)"/>
      <line id="Line_12" data-name="Line 12" class="cls-2" x2="1" y2="89" transform="translate(695.884 169.926)"/>
      <line id="Line_13" data-name="Line 13" class="cls-2" x2="1" y2="89" transform="translate(731.884 135.926)"/>
      <line id="Line_14" data-name="Line 14" class="cls-2" x2="1" y2="74" transform="translate(830.884 57.926)"/>
      <line id="Line_10" data-name="Line 10" class="cls-2" x2="1" y2="89" transform="translate(617.884 207.926)"/>
      <line id="Line_2" data-name="Line 2" class="cls-2" x2="1" y2="89" transform="translate(101.884 27.926)"/>
      <path id="Path_13" data-name="Path 13" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(78 185.926)"/>
      <path id="Path_14" data-name="Path 14" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(145 154.926)"/>
      <path id="Path_15" data-name="Path 15" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(189 117.926)"/>
      <path id="Path_16" data-name="Path 16" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(261 63.926)"/>
      <path id="Path_19" data-name="Path 19" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(438 180.926)"/>
      <path id="Path_20" data-name="Path 20" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(499 154.926)"/>
      <path id="Path_21" data-name="Path 21" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(532 164.926)"/>
      <path id="Path_22" data-name="Path 22" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(608 122.926)"/>
      <path id="Path_23" data-name="Path 23" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(645 91.926)"/>
      <path id="Path_24" data-name="Path 24" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(744 0.926)"/>
      <path id="Path_17" data-name="Path 17" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(298 30.926)"/>
      <path id="Path_18" data-name="Path 18" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(406 -20.074)"/>
      <path id="Path_4" data-name="Path 4" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(15 -8.074)"/>
      <path id="Path_5" data-name="Path 5" class="cls-3" d="M87.55,130.03c-15.635-9.381,0-21.107,0-28.142Z" transform="translate(-61 25.926)"/>
      <text id="HTML" class="cls-4" transform="translate(54.384 54.426)"><tspan x="0" y="0">HTML</tspan></text>
      <path id="Path_6" data-name="Path 6" class="cls-3" d="M23.076,49l79.248-34.5V63.616L23.076,99.339Z" transform="translate(0 9.926)"/>
      <path id="Path_9" data-name="Path 9" class="cls-3" d="M23.076,56.9l108-42.4V74.861l-108,43.9Z" transform="translate(362.808 -14.497)"/>
      <path id="Path_10" data-name="Path 10" class="cls-3" d="M23.076,51.494l62.078-37V67.166l-62.078,38.3Z" transform="translate(500.209 165.417) rotate(-1)"/>
      <path id="Path_11" data-name="Path 11" class="cls-3" d="M23.076,59.8,103.63,14.5V79l-80.554,46.91Z" transform="translate(591.495 110.683) rotate(-2)"/>
      <path id="Path_12" data-name="Path 12" class="cls-3" d="M23.076,66.7,126.592,14.5V88.818L23.076,142.87Z" transform="translate(702.907 -0.144) rotate(-2)"/>
      <path id="Path_7" data-name="Path 7" class="cls-3" d="M23.076,56.589l67-42.092V74.421L23.076,118Z" transform="translate(141.808 163.926)"/>
      <path id="Path_8" data-name="Path 8" class="cls-3" d="M23.076,60.623,96.726,14.5V80.163L23.076,127.92Z" transform="translate(251.711 70.814) rotate(-2)"/>
      <text id="JavaScript" class="cls-5" transform="translate(727.739 87.092) rotate(-30)"><tspan x="0" y="22">JavaScript</tspan></text>
      <text id="MySQL" class="cls-6" transform="translate(618.493 179.905) rotate(-30)"><tspan x="0" y="22">MySQL</tspan></text>
      <text id="PHP" class="cls-6" transform="matrix(0.848, -0.53, 0.53, 0.848, 529.764, 225.264)"><tspan x="0" y="22">PHP</tspan></text>
      <text id="Bootstrap" class="cls-6" transform="translate(392.969 50.86) rotate(-22)"><tspan x="0" y="22">Bootstrap</tspan></text>
      <text id="Laravel_" data-name="Laravel
" class="cls-6" transform="matrix(0.829, -0.559, 0.559, 0.829, 275.045, 144.046)"><tspan x="0" y="22">Laravel</tspan></text>
      <text id="CSS" class="cls-6" transform="matrix(0.848, -0.53, 0.53, 0.848, 174.022, 223.19)"><tspan x="0" y="22">CSS</tspan></text>
      <text id="HTML-2" data-name="HTML" class="cls-6" transform="translate(30.364 63.274) rotate(-25)"><tspan x="0" y="22">HTML</tspan></text>
    </g>
  </g>
</svg>
</div>
</div>
</div>


</div>



</div>
</div>
<br><br>
<div class="container">

  <div class="row d-flex justify-content-between">
    <div class="col-md-2">
    </div>
    <div class="col-md-6">

      <h5  class="font-weight-bolder" style="text-shadow:2px 2px LightSalmon;color:#330000">Roles and Responsibilities  <span><i class="fab fa-redhat"></i></span></h5>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#role1">Lecturer</button>
      <div id="role1" class="collapse">
        <ul>
          <li>Adhiamaan College of Engineering, Hosur,Jul 2006 –Aug,2006.</li>
            <li>K.L.N.College of Engineering, Madurai, Jun 2004-Jan 2006.</li>
        </ul>
      </div>  <br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#role2">Class Coordinator</button>
      <div id="role2" class="collapse">
          	Class In-charge for one class of 66 students every Semester
      </div>  <br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#role3">Result Analysis Incharge</button>
      <div id="role3" class="collapse">
          	Responsible for producing the report on the Semester Examinaion results in the Department
      </div>  <br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#role4">Lab Incharge</button>
      <div id="role4" class="collapse">
          	Responsible for procuring equipments and maintaining the Communication Systems Laboratory
      </div>  <br>
    </div>

    <div class="col-md-4 ">

      <h5  class="font-weight-bolder" style="text-shadow:2px 2px LightSalmon;color:#330000">Courses <span><i class="fas fa-scroll"></i></span></h5>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#course1">Professional Ethics</button>
      <div id="course1" class="collapse">
        Attended a course on “Professional Ethics” from April 18-23, 2005 at K.L.N.College of Engineering conducted by the Centre for Faculty Development, Anna University.
      </div>  <br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#course2">Team Building</button>
      <div id="course2" class="collapse">
        Attended an One Day Program on “Team Building” on July 31,2004 at K.L.N.College of Engineering organised by ISTE Staff Chapter.
      </div><br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#course3">Total Quality Management</button>
      <div id="course3" class="collapse">
        Course on “Total Quality Management” from Nov 29-Dec 4, 2004 at B.S.A. Crescent Engineering College conducted by the Centre for Faculty Development, Anna University.
      </div><br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#course4">Student Guidance and Counselling</button>
      <div id="course4" class="collapse">
        Attended a course on “Student Guidance and Counselling” from Aug 27-29, 2004 at K.L.N.College of Engineering conducted by the National Institute of Technical Teachers Training & Research, Chennai.
      </div><br>

      <button class="btn btn-link" style="color:LightSalmon" data-toggle="collapse" data-target="#course5">Application of GIS</button>
      <div id="course5" class="collapse">
        Workshop cum User meet on “Application of GIS” on Aug 13-14, 2003 by the Department of Future Studies at Madurai Kamaraj University.
      </div><br>

    </div>

  </div>


</div>

</div>

</div>
<div class="container" >
<div class="row d-flex justify-content-center m-10 ">
  <div class="col-md-10 bg p-3">
<div class="row d-flex justify-content-center">  <div class="col-md-6 "style="padding-top:20%;padding-left:20%">
    <h2 class="text-white flext-item"><i>Just Relaxing....</i></h2>
  </div>
  <div class="col-md-4">
<div class="row">
  <div class="col text-white pt-2">
        <img src="{{ asset('/images/chickens.jpg')}}" class="card-img-top rounded-circle" alt="chickens" style="height:150px;width:150px"/>
      </div>
      <div class="col text-secondary pt-5">
        <b>Chickens</b><br><i>The two Isabrowns...</i>
      </div>

    </div>
    <div class="row ">

        <div class="col text-secondary pt-3">
            <b>Sewing</b><br> </i>From curtains to blouses...</i>
          </div>
        <div class="col ">
        <img src="{{ asset('/images/sewing.jpg')}}" class="float-right rounded-circle" alt="sewing" style="height:150px;width:150px" />

      </div>
    </div>
    <div class="row">
      <div class="col  pl-2">
      <img src="{{ asset('/images/garden.jpg')}}" class="card-img-top rounded-circle" alt="garden" style="height:150px;width:150px" />
    </div>
    <div class="col text-secondary pt-3 ">
      <b>Garden</b><br><i>The smiling flowers and the delicious eatables...</i>
    </div>


  </div>
    </div>

  </div>

</div>
</div>
</div>
</div>
<div class="container">
<div class="row d-flex justify-content-center m-3">
  <div class="col-md-8">
  <h5  class="font-weight-bolder" style="text-shadow:2px 2px LightSalmon;color:#330000">Presentations  <span><i class="fas fa-file-signature"></i></span></h5>
<div style="color:LightSalmon">
  <ul>

  <li>Presented a paper titled, “Wavelet Based Texture Classification for Change Detection Studies” on May 28-29,2004 at the International Conference on Soft Computing held at Bharath Institute of Higher Education and Research, Chennai.</li><br>

<li>	Presented a paper titled, “Performance Analysis of Texture Segmentation for Remotely Sensed Data” on April 7- 8,2004 at the National Conference on Recent Trends in Communication Techniques, held at Noorul Islam College of Engineering, Kumaracoil.</li><br>

<li>	Presented a paper titled, “Wavelet based Texture Segmentation for Remotely Sensed Data” on Feb 13-14,2004 at the National Conference on Advanced Image Processing and Networking held at National Engineering College, Kovilpatti.</li><br>

</div>

<br><br>
</div>
</div>
<script>
$(document).ready(function(){
   $(".active").removeClass("active");
   $("#link-about").addClass("active");
});
</script>
@endsection
