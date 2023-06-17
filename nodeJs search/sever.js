const fs = require("fs");
const url = require("url");
const path = require("path");
const http = require("http");
const qs = require('querystring');
const dotenv = require("dotenv").config();

const port  = process.env.port;

const server = http.createServer((req, res) =>{
    const checkForFileInUrl = url.parse(req.url,true).pathname;
    let filePath = path.join(__dirname, "public", checkForFileInUrl == "/" ? 'index.html' : checkForFileInUrl);

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

    try {
        const fileData = fs.readFileSync(filePath, "utf-8");
        res.writeHead(200, {'Content-Type': contentType})
        res.end(fileData);
    } catch (err) {
        if(err.code === "ENOENT"){
            const notFoundPage = fs.readFileSync(path.join(__dirname, "public", "404.html"), "utf-8")
            res.end(notFoundPage);
        }else{
            res.writeHead(500);
            res.end(`Server Error: ${err}`)
        }
    }
});

server.listen(port, () => console.log(`Server started at port: ${port}`));

//making server for post request
const requestPort = process.env.requestPort;
const requestServer = http.createServer((req, res) => {
    if(req.method === "POST"){
        let body = '';
        req.on('data', (chunk) => {
        // Collect the form data
        body += chunk.toString();
        });
        req.on('end', () => {
        // Parse the form data
        const formData = qs.parse(body).input;
        res.writeHead(301, {
            'Location': `http://localhost/index.html?type=${formData}`,
            'Content-Type': 'text/plain'
        }).end();
        });
    }
});

requestServer.listen(requestPort, () => console.log(`Server started at port: ${requestPort}`));