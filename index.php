<!DOCTYPE HTML>
<HTML>
  <HEAD>

    <META name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">

    <TITLE>Pixoo</TITLE>

    <script src="jscolor-2\jscolor.js"></script> <!-- https://jscolor.com -->

    <STYLE>
      .box { 
        float: left; 
        width: 40px; 
        height: 40px; 
        margin: 2px; 
        padding: 2px; 
        background: #4287f5; 
        box-sizing: border-box; 
      }
      .box_in_line { 
        float: left; 
      }
      .box_next_line { 
        float: left; 
        clear: left; 
      }
    </STYLE>

    <SCRIPT>

      class display_num {
        constructor(identifier, pixelid, color, width) {
          this.identifier = identifier;
          this.pixelid = pixelid;
          this.color = color;
          this.value = null;
        }
      }
      class display_matrix {
        constructor(pixelcount) {
          this.pixel = [];
          for (var i = 0; i < pixelcount; i++) {
            this.pixel.push("#000000");
          }
          this.numbers = [];
        }
      }
      class display {
        constructor() {

        }
        reset(matrix,matrixcount,url,animationspeed){
          this.matrixcount = matrixcount;
          this.width = parseInt(matrix);
          this.url = url;
          this.pixelcount = this.width * this.width;
          this.animationspeed = animationspeed; // Animation Speed in ms
          this.matrixes = [];
          for (var i = 0; i < this.matrixcount; i++) {
            this.matrixes.push(new display_matrix(this.pixelcount));
          }
        }
        changePixelColor(matrixid,pixelid,color){
          if (pixelid <= this.pixelcount) this.matrixes[matrixid].pixel[pixelid] = color;
        }
        addNum(matrixid,pixelid,identifier,color){
          pixelid = parseInt(pixelid);
          this.matrixes[matrixid].numbers.push(new display_num(pixelid,pixelid,color,this.width));

        }
        writeChar(matrixid,pixelid,char,color){
          pixelid = parseInt(pixelid);
          var pixelarray = [];
          if (char=="full") pixelarray = this.writeCharFull(pixelid);
          if (char=="1") pixelarray = this.writeChar1(pixelid);
          if (char=="2") pixelarray = this.writeChar2(pixelid);
          if (char=="3") pixelarray = this.writeChar3(pixelid);
          if (char=="4") pixelarray = this.writeChar4(pixelid);
          if (char=="5") pixelarray = this.writeChar5(pixelid);
          if (char=="6") pixelarray = this.writeChar6(pixelid);
          if (char=="7") pixelarray = this.writeChar7(pixelid);
          if (char=="8") pixelarray = this.writeChar8(pixelid);
          if (char=="9") pixelarray = this.writeChar9(pixelid);
          if (char=="0") pixelarray = this.writeChar0(pixelid);
          for (var i = 0; i < pixelarray.length; i++) {
            this.changePixelColor(matrixid,pixelarray[i],color);
          }
        }
        writeCharFull(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (1 * this.width) + 1,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 0,pixelid + (3 * this.width) + 1,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar1(pixelid){
          return [pixelid + (0 * this.width) + 1,pixelid + (1 * this.width) + 0,pixelid + (1 * this.width) + 1,pixelid + (2 * this.width) + 1,pixelid + (3 * this.width) + 1,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar2(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 0,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar3(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar4(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 2];
        }
        writeChar5(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar6(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 0,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar7(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 2];
        }
        writeChar8(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 0,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar9(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 1,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
        writeChar0(pixelid){
          return [pixelid + (0 * this.width) + 0,pixelid + (0 * this.width) + 1,pixelid + (0 * this.width) + 2,pixelid + (1 * this.width) + 0,pixelid + (1 * this.width) + 2,pixelid + (2 * this.width) + 0,pixelid + (2 * this.width) + 2,pixelid + (3 * this.width) + 0,pixelid + (3 * this.width) + 2,pixelid + (4 * this.width) + 0,pixelid + (4 * this.width) + 1,pixelid + (4 * this.width) + 2];
        }
      }

      let isMouseDown;
      document.addEventListener('mousedown', () => isMouseDown = true);
      document.addEventListener('mouseup', () => isMouseDown = false);

      var xmlHttpSend=createXmlHttpObject();
      var myDisplay = new display();

      function createXmlHttpObject(){
        if(window.XMLHttpRequest){
            xmlHttp=new XMLHttpRequest();
        }else{
            xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
        }
        return xmlHttp;
      }

      function resetMatrix(){

        myDisplay = new display();
        myDisplay.reset(document.getElementById("matrix_size").value,document.getElementById("matrix_count").value,document.getElementById("deviceUrl").value,document.getElementById("animationSpeed").value);

        refreshJSON();
        refreshMatrixes();

      }

      function importJson()
      {
        var myImportedDisplay = JSON.parse(document.getElementById("textarea_json").value);
        // Import
        myDisplay.matrixcount = myImportedDisplay.matrixcount;
        myDisplay.width = myImportedDisplay.width;
        myDisplay.pixelcount = myImportedDisplay.pixelcount;
        myDisplay.animationspeed = myImportedDisplay.animationspeed;
        myDisplay.url = myImportedDisplay.url;
        myDisplay.matrixes = myImportedDisplay.matrixes;
        // Show
        document.getElementById("matrix_count").value = myDisplay.matrixcount;
        document.getElementById("matrix_size").value = myDisplay.width;
        document.getElementById("animationSpeed").value = myDisplay.animationspeed;
        document.getElementById("deviceUrl").value = myDisplay.url;
        refreshMatrixes();
      }

      function refreshJSON(){
        //alert("jan");
        json_str = JSON.stringify(myDisplay);
        document.getElementById("textarea_json").value = json_str;

      }

      function refreshMatrixes(){
        document.getElementById("box_matrix_0").innerHTML = "";
        document.getElementById("box_matrix_1").innerHTML = "";
        document.getElementById("box_matrix_2").innerHTML = "";
        for (var i = 0; i < myDisplay.matrixes.length; i++) { 
          refreshMatrix(i);
        } 
      }

      function refreshMatrix(matrixid){

        // Color Pixels
        matrix = "";
        counter = 0;
        pixel_size = document.getElementById("pixel_size").value;
        for (var i = 0; i < myDisplay.matrixes[matrixid].pixel.length; i++) { 
          if (counter < myDisplay.width) matrix += '<div id="matrix_' + matrixid + '_pixel_' + i + '" class="box box_in_line" style="background:' + myDisplay.matrixes[matrixid].pixel[i] + ';width:' + pixel_size + 'px;height:' + pixel_size + 'px;" onclick="changePixel(' + matrixid + ',' + i + ')" onmouseenter="showMatrixPosition(' + matrixid + ',' + i + ')"></div>';
          if (counter == myDisplay.width) { 
            matrix += '<div id="matrix_' + matrixid + '_pixel_' + i + '" class="box box_next_line" style="background:' + myDisplay.matrixes[matrixid].pixel[i] + ';width:' + pixel_size + 'px;height:' + pixel_size + 'px;" onclick="changePixel(' + matrixid + ',' + i + ')" onmouseenter="showMatrixPosition(' + matrixid + ',' + i + ')"></div>';
            counter = 0;
          }
          counter = counter + 1;
        }
        document.getElementById("box_matrix_" + matrixid).innerHTML = matrix;

        // Mark Num and Char space
        for (var xa = 0; xa < myDisplay.matrixes[matrixid].numbers.length; xa++) { 
          var num_pixel_array = myDisplay.writeCharFull(myDisplay.matrixes[matrixid].numbers[xa].pixelid);
          for (var xb = 0; xb < num_pixel_array.length; xb++) { 
            document.getElementById("matrix_" + matrixid + "_pixel_" + num_pixel_array[xb]).style.border = "thin dotted " + myDisplay.matrixes[matrixid].numbers[xa].color;
          }
        }

      }

      function changePixel(matrixid,pixelid){

        if (document.getElementById("radio_color").checked) {
          myDisplay.changePixelColor(matrixid,pixelid,document.getElementById("colorpicker_1").value);
        }
        if (document.getElementById("radio_char").checked) {
          myDisplay.writeChar(matrixid,pixelid,document.getElementById("writeChar_char").value,document.getElementById("colorpicker_1").value);
        }
        radio_field_num
        if (document.getElementById("radio_field_num").checked) {
          myDisplay.addNum(matrixid,pixelid,document.getElementById("writeChar_char").value,document.getElementById("colorpicker_1").value);
        }
        if (document.getElementById("radio_eraser").checked) {
          myDisplay.changePixelColor(matrixid,pixelid,"#000000");
        }
        if (document.getElementById("radio_pipette").checked) {
          document.getElementById("colorpicker_1").jscolor.fromString(RGBToHex(document.getElementById("matrix_" + matrixid + "_pixel_" + pixelid).style.background));
        }
        refreshJSON();
        refreshMatrixes();

      }

      function changeMatrix(){
        json = document.getElementById("textarea_json").value;
        json_obj = JSON.parse(json);
        for (var i = 0; i < json_obj.pixel_1.length; i++) {
          var pixel = json_obj.pixel_1[i];
          document.getElementById("pixel_1_" + i).style.background = pixel;
        }
      }

      function showMatrixPosition(matrixid,pixelid)
      {
        document.getElementById("matrix_position").value = pixelid;
        if (isMouseDown) {
          if (document.getElementById("radio_color").checked) {
            myDisplay.changePixelColor(matrixid,pixelid,document.getElementById("colorpicker_1").value);
          }
          if (document.getElementById("radio_eraser").checked) {
            myDisplay.changePixelColor(matrixid,pixelid,"#000000");
          }
          refreshJSON();
          refreshMatrixes();
        }
      }

      function hex_to_ascii(str1)
      {
        var hex  = str1.toString();
        var str = '';
        for (var n = 0; n < hex.length; n += 2) {
          str += String.fromCharCode(parseInt(hex.substr(n, 2), 16));
        }
        return str;
      }

      function RGBToHex(rgb) {
        // Choose correct separator
        let sep = rgb.indexOf(",") > -1 ? "," : " ";
        // Turn "rgb(r,g,b)" into [r,g,b]
        rgb = rgb.substr(4).split(")")[0].split(sep);

        let r = (+rgb[0]).toString(16),
            g = (+rgb[1]).toString(16),
            b = (+rgb[2]).toString(16);

        if (r.length == 1)
          r = "0" + r;
        if (g.length == 1)
          g = "0" + g;
        if (b.length == 1)
          b = "0" + b;

        return "#" + r + g + b;
      }

      function sendDevice()
      {
        httpRequestData = document.getElementById("textarea_json").value;
        // Send
        if(xmlHttpSend.readyState==0 || xmlHttpSend.readyState==4){
          xmlHttpSend.open('POST',"actmatrix.php",true);
          xmlHttpSend.setRequestHeader("Content-Type", "application/json");
          xmlHttpSend.onreadystatechange=handleServerResponseDevice;
          xmlHttpSend.send(httpRequestData);
        }
      }

      function handleServerResponseDevice(){
        if(xmlHttpSend.readyState==4) {
          if (xmlHttpSend.status==200) {
            document.getElementById("box_response").innerHTML = xmlHttpSend.response;
          }
        }
      }

    </SCRIPT>
  </HEAD>
  <BODY style="background: #D6EBFF;" onload='resetMatrix();'>

  <div id="box_header" class="box_next_line" style="background: #ffffff;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
    Matrix: <select name="matrix_count" id="matrix_count">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    | Size:
    <select name="matrix_size" id="matrix_size">
      <option value="16">16</option>
      <option value="64">64</option>
    </select>
    | PSize:
    <select name="pixel_size" id="pixel_size">
      <option value="20">20</option>
    </select>
    | Speed:
    <input type="text" id="animationSpeed" value="1000" style="width:50px;">ms
    | Url:
    <input type="text" id="deviceUrl" value="http://192.168.178.95/post" style="width:200px;">
    <button onclick="resetMatrix()" class="">Reset</button>
    </div>

    <div id="box_color" class="box_next_line" style="background: #ffffff;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
      Pixel: <input type="text" id="matrix_position" value="--" style="width:50px;">
      <br>
      <input id="colorpicker_1" value="#71FF3D" data-jscolor="{}" style="width:80px;border:0px;">
      <br>
      <input type="radio" id="radio_color" name="radio" value="" checked> Stift
      <br>
      <input type="radio" id="radio_char" name="radio" value=""> Text 
      <select name="writeChar_char" id="writeChar_char">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="0">0</option>
      </select>
      <br>
      <input type="radio" id="radio_field_num" name="radio" value=""> Nummernfeld 
      <br>
      <input type="radio" id="radio_eraser" name="radio" value=""> Radierer
      <br>
      <input type="radio" id="radio_pipette" name="radio" value=""> Pipette
    </div>

    <div id="box_matrix_0" class="box_next_line" style="background: #1A1A1A;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
    </div>
    <div id="box_matrix_1" class="box_in_line" style="background: #1A1A1A;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
    </div>
    <div id="box_matrix_2" class="box_in_line" style="background: #1A1A1A;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
    </div>

    <div id="box_jsonarea" class="box_next_line" style="background: #ffffff;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
      <textarea id="textarea_json" style="width:500px;height:100px;">none</textarea>
      <br>
      <button onclick="importJson()">Import Json</button>
    </div>

    <div id="box_send" class="box_next_line" style="background: #ffffff;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
      <button onclick="sendDevice()">Send to Pixoo</button>
    </div>

    <div id="box_response" class="box_next_line" style="background: #ffffff;margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:1px solid #a6a6a6;">
      <textarea id="textarea_response" style="width:500px;height:100px;">none</textarea>
    </div>

    <div id="box_space" class="box_next_line" style="margin-left:20px;margin-top:10px;padding:5px;border-radius: 1em;border:0px solid #a6a6a6;">
      <br><br>
    </div>

  </BODY>
</HTML>
