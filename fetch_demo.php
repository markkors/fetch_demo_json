<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo met Fetch</title>
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <div class="form"><div>
            <input id="fn" type="text" name="fn" placeholder="voornaam">
        </div>
        <div>
            <input id="ln" type="text" name="ln" placeholder="achternaam">
        </div>
        <div>
            <input id="delay" type="text" name="delay" placeholder="delay">
        </div>
        <div>
            <button id="verstuur">Verstuur</button>
        </div>
    </div>

    <div class="extra" id="extra_info">
        <div class="loader" id="ldr1"></div>
    </div>
</div>

    <script>
        document.getElementById("verstuur").addEventListener("click",function(e) {
            e.preventDefault();

            document.getElementById("ldr1").style.display="block";
            doSubmit().then(function(data) {
               document.getElementById("ldr1").style.display="none";
            });
        });

        async function doSubmit() {
            let data = {"student":null, "action":"add_student", "extra":null};
            let fn = document.getElementById("fn").value;
            let ln = document.getElementById("ln").value;
            let delay = document.getElementById("delay").value;
            let s = {
                "firstname":fn,
                "lastname":ln
            }
            data.student = s;
            data.extra = delay;


            const r = await fetch('action.php', {
                method:'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
            }).then(function(response){
                return response.json();
            }).then(function(data){
                // success
                console.log(data);
                return data;
            }).catch(function (error){
                console.log('Error :',error)
                let e = document.getElementById("extra_info");
                let n = document.createElement("DIV");
                n.innerText = error
                e.appendChild(n);
            });
            return r;
        }
    </script>

</body>
</html>