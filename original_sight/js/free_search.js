// -------------------------------------------------
// 初期設定（いったんHTMLを空にする）
// -------------------------------------------------
$(function(){
    $("table.tbl tbody").html("");
});

// ------------------------------------------------
// XML読み込み
// -------------------------------------------------

function xmlLoad(){
    $.ajax({
        url:'xml/data.xml',
        type:'get',
        dataType:'xml',
    });
}

// -------------------------------------------------
// XMLデータを取得
// -------------------------------------------------

function parse_xml(xml,status){
    if(status!='success')return;
    $(xml).find('item').each(disp);
}

// -------------------------------------------------
// HTML生成関数
// -------------------------------------------------

function disp(){

    //各要素を変数に格納
    var $day = $(this).find('day').text();
    var $label = $(this).find('label').text();
    var $category = $(this).find('category').text();
    var $content = $(this).find('content').text();
    var $url = $(this).find('url').text();
    var $target = $(this).find('target').text();

    //HTMLを生成
    $('<tr>'+
        '<th>'+$day+'</th>'+
        '<td class="label"><span class="'+$label+'">'+$category+'</span></td>'+
        '<td><a href="'+$url+'" target="'+$target+'">'+$content+'</a></td>'+
        '</tr>').appendTo('table.tbl tbody');
}

//関数実行
$(function(){
    xmlLoad();
});
