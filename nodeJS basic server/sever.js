const http = require("http");
const path = require("path")
const fs = require("fs")
const dotenv = require("dotenv").config();

const port  = process.env.port;

const server = http.createServer((req, res) =>{
    const filePath = path.join(__dirname,"public",req.url === "/" ? "index.html" : req.url);
    let extname = path.extname(filePath);

    let contentType = 'text/html';
    switch (extname) {
        case ".js":
            contentType = "text/javascript";
            break;
        case ".css":
            contentType = "text/css";
            break;
        case ".json":
            contentType = "application/json";
            break;
        case ".png":
            contentType = "image/png";
            break;
        case ".jpg":
            contentType = "image/jpg";
            break;
    }

    const htmlFile = fs.readFileSync(filePath, "utf-8");

    res.writeHead(200,{"content-type": contentType});
    res.end(htmlFile);
});

server.listen(port, () => console.log(`Server started at port: ${port}`));