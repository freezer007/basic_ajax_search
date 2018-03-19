<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
    /* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}
#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
</style>

<!-- Team -->
<section id="team" class="pb-5">
    <div class="container">
        <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" id="searcht" placeholder="Search" />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-light" id="advancebtn">Advance seach</button>
                    </span>
                    <span class="input-group-btn">
                        <a href="upload/"><button type="button" class="btn btn-light">Upload</button></a>
                    </span>
                </div>
            </div>
            <div id="advanceb">
                <input type="text" class="form-control input-lg" id="aauthor" placeholder="Author" value=""/>
                <input type="text" class="form-control input-lg" id="asubject" placeholder="Subject" value=""/>
            </div>
        <script>
            var page=1;
            $('#advanceb').hide();
            $('#advancebtn').click(function(){
                $('#advanceb').toggle();
            });
            $(function() {
              $("#searcht").focus();
            });
            $(document).ready(function() {
                load_data(1); 
                $('#searcht').keyup(function(){
                    load_data(1);
                    page=1;
                });
                $('#aauthor').keyup(function(){
                    load_data(1);
                    page=1;
                });
                $('#asubject').keyup(function(){
                    load_data(1);
                    page=1;
                });
                function load_data(page){
                    var query = $('#searcht').val();
                    var aauthor = $('#aauthor').val();
                    var asubject = $('#asubject').val();
                    $.ajax({
                            url:"sajax.php",
                            method:"GET",
                            data:{query:query,auth:aauthor,sub:asubject,page:page},
                            success:function(data)
                            {
                                $('#topr').html(data);
                            }
                    });
                }
                $(document).on('click', '.pageitem', function(){  
                       var itm = $(this).attr("id");  
                       if(itm == 1 && page >1){
                        page = page-1;
                       }
                       if(itm == 2){
                        page = page+1;
                       }
                       load_data(page);  
                });
            });

        </script>
        <div class="row" id="topr">

        </div>
    </div>
    
</section>
<!-- Team -->
<ul class="pagination" style="margin: auto;width:30%; ">
      <li class="pageitem" id="1"><button type="button" class="btn btn-success">previous</button></li>

      <li class="pageitem" id="2"><button type="button" class="btn btn-success">next</button></li>
</ul>