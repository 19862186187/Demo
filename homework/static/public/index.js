var src="";
var item= "";
var bookList="";
$(document).ready(function () {
    //点击目录渲染内容
    $('.catalogue li').click(function (that) {
        var req=new FormData();
        for (var i = 0;i<$('.catalogue li').length;i++){
            $('.catalogue li')[i].style.backgroundColor="white";
        }
        that.target.style.backgroundColor="#999999"
        var type=this.innerHTML;
        req.append("majorType",type);
        console.log(req)
        $('.item').html('')
        $.ajax({
            url:'api/books.php',
            type:'post',
            data:req,
            contentType:false,
            processData:false,
            success:function (e) {
                console.log('success:\n')

                console.log(JSON.parse(e));
                show(JSON.parse(e));
            },
            error:function (e) {
                console.log('error:\n')
                $('.content').html("这里暂时还没有东西嗷~");
            },
            complete:function (e) {
                console.log('complete:\n')
            }
        })
    })
    //用于展示内容
    function show(list) {
        var coverImgType="";
        var coverImg="";
        var bookName="";
        var source="";
        var author="";
        var majorType="";
        var id=0;
        var localPath="";
        if(list.length==0){
            $('.content').html("这里暂时还没有东西嗷~");
        }else{
            console.log(list.length)
            for(var i = 0;i<list.length;i=i+2){
                coverImgType=list[i]["coverImgType"];
                coverImg=list[i]["coverImg"];
                bookName=list[i]["bookName"];
                source=list[i]["source"];
                author=list[i]["author"];
                majorType=list[i]["majorType"];
                id=list[i]["id"];
                localPath=JSON.stringify(list[i]["localPath"]);
                src="data:"+coverImgType+";base64,"+coverImg;
                item="<div class=\"item\">"+
                    "<img src="+src+" class=\"bookCover\">\n" +
                    "<div class='msgBox'>\n" +
                    "<p class=\"bookName\">《"+bookName+"》</p>\n" +
                    "<span>出版社："+source+"</span><br>" +
                    "<span>作者："+author+"</span><br>" +
                    "<span>类型："+majorType+"</span><br>" +
                    "</div>"+
                    "<a>详情</a>"+
                    "<a class='download' href="+localPath+">下载</a>"+
                    "</div>";
                bookList+=item;
            }
            $('.content').html(bookList);
            bookList="";
            item= "";
        }
    }
})