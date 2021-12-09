<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Form</title>
</head>
<style>
.divtext {
    border: ridge 2px;
    padding: 5px;
    width: 20em;
    min-height: 5em;
    overflow: auto;
    width: 100%;
}

</style>
<body>
        <div class="container">
            <div class="row">
            <div class="col-md-12">
    <form action="/form" method="POST">
        @csrf
        <div class="form-group">

                    <label for="exampleFormControlTextarea1">Type your text Here</label>
                    <textarea name ="form" class="form-control" id="exampleFormControlTextarea1" rows="3" onkeyup="wordcount(this.value)"></textarea>
                    @error('form')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                    <button class="btn btn-dark" type="submit">STORE</button>
             </form>
      <hr>
                    <p>Words Count</p>
                    <input class="form-control" type="text" id="w_count" size="4 "readonly>

                    
            </div>

            <div class="col-md-12">

                

                @if(isset($data))
                <br>
                <mark>Text Stored In database</mark>
                <hr>
                <label class="form-label">Paragraph</label >
                <div class="divtext form-control" contentEditable>{{$data}}</div>
                {{-- <textarea class="form-control"   readonly/>{{ $data}}</textarea> --}}
                @endif
            </div>


            <div class="col-md-12">

                

                @if(isset($frequency))
                <br>
                <hr>
                <small>How often they appear in database</small>
                
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Words</th>
                      <th scope="col">Appearance</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($frequency as $key => $value)
                      <tr>
                        <td>{{ $key}}</td>
                        <td>{{$value}}</td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>               
                @endif
            </div>

           
            </div>

               
        </div>
        
    
</body>
</html>


<script type="text/javascript">
     var cnt;
    function wordcount(str) {
        var count = 0;
        if(str.length != 0)
        {
            var regEx = /([^\u0000-\u007F]|\w)+/g;  
             var count =  str.match(regEx).length;
        }
       


        // var stringArray = str.split(' ');
        // var count = 0;
        // for (var i = 0; i < stringArray.length; i++) {
        //     var word = stringArray[i];
        //     if (/[A-Za-z]/.test(word)) {
        //         count++
        //     }
        // }
        // ----------------------------------------------------
        // return count
        // var words = count.split(/\s/);
        // cnt = words.length;
        var ele = document.getElementById('w_count');
        ele.value = count;
    }
    // document.write("<input class='form-control' type=text id=w_count size=4 readonly>");
</script>
