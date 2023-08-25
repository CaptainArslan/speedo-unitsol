<link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=2.9.0') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=2.9.0') }}">
{{-- <link id="skin-default" rel="stylesheet" href="{{ asset('main/site.css') }}"> --}}
<style>
   li {
 display: block;
 transition-duration: 0.5s;
}

li:hover {
  cursor: pointer;
}
ul li ul {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  transition: all 0.5s ease;
 width: 360px;
  left: 0;
  display: none;
  background-color: rgba(10,9,10,.75);
}

ul li:hover > ul,
ul li ul:hover {
  visibility: visible;
  opacity: 1;
  display: block;
}

ul li ul li {
  clear: both; 
  width: 100%;
  margin-left: 15px;
  /* text-align: center; */
}
ul li ul li a{
    /* font-size: 15px; */
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    letter-spacing: 0.5px;
    font-family: calluna;
    font-weight: 400;
    font-style: normal;
    font-size: 12px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    text-decoration: none;
    line-height: 1em;
  color:aliceblue
}
</style>
