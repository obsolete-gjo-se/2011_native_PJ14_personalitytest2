Dim url 
Dim uri 

url = "http://www.microsoft.com:81/test/?a=1&b=2&c=3"
Set uri = NEW uri(url)

MsgBox uri

Response.Write(uri.Scheme & "&lt;br&gt;")
Response.Write(uri.Host & "&lt;br&gt;")
Response.Write(uri.Port & "&lt;br&gt;")
Response.Write(uri.LocalPath & "&lt;br&gt;")
Response.Write(uri.Query & "&lt;br&gt;")

Response.Write(uri.Scheme & "://" & uri.Host & ":" & uri.Port & uri.LocalPath & "&lt;br&gt;")
Response.Write(url.Substring(0, url.Length - uri.Query.Length) & "&lt;br&gt;")
