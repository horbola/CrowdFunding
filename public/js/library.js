
/*
 * builds query string to append to an url.
 */
function BuildQueryString(){
    var queryString = "";
    
    this.append = function(key, value){
        let kv = "";
        if(queryString === ""){
            kv = "?"+key+"="+value;
        }
        else kv = "&"+key+"="+value;
        queryString += kv;
    };
    
    this.getQueryString = function(){
        let qs = encodeURI(queryString);
        return qs;
    };
}

/*
 * builds a http form dynamically.
 */
function Form(location, method) {
    var form = document.createElement("form");
    // the url to which http request will be generated.
    form.action = location;
    // the http method
    form.method = method;

    // creates an input field in the form.
    this.append = function(name, data){
        makeNameValueString(name, data);
        var element = document.createElement("input");
        element.type = "hidden";
        element.name = name;
        element.value = data;
        form.appendChild(element);
    };

    // submits the form actually.
    this.submit = function(){
        document.body.appendChild(form);
        form.submit(); 
    };

    // for debugging pupose ------------------
    let nameValueString = "";
    function makeNameValueString(name, value){
        nameValueString += "{" +name+ " : " +value+ "}, ";
    };
    
    this.getNameValueString = function(){
        return nameValueString.substring(0, nameValueString.length-2);
    };
    // ---------------------------------------
}
