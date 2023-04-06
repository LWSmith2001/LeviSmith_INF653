const fs = require("fs");
const path = require("path");
const http = require("http");
const port = 3000;
const eventLogger = require("./logEvents.js");

eventLogger("Server Created on port: " + port);
console.log("Server Created on port: " + port);

http.createServer((req, res) => {
  let filePath = path.join(__dirname, req.url == "/" ? "index.html" : req.url);

  let contentType = "text/html";

  switch(path.extname(filePath)) {
    case ".html" : contentType = "text/html"; break;
    case ".jpg" : contentType = "image/jpg"; break;
  }
  if (fs.existsSync(filePath)) {
    fs.readFile(filePath, (err, data) => {
      if (err) { return; } else {
        res.writeHead(200, { "Content-Type" : contentType });
        res.end(data);
        eventLogger("File Served: " + req.url);
        console.log("File Served: " + req.url);
      }
    })
  } else {
    fs.readFile("./404.html", (err, data) => {
      if (err) {return; } else {
        res.writeHead(404);
        res.end(data);
        eventLogger("Redirected to 404 from file path: " + filePath);
        console.log("Redirected to 404 from file path: " + filePath);
      }
    })
  }


}).listen(port)

