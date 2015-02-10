#include <SPI.h> 
#include <Ethernet.h> //Declaración de la direcciones MAC e IP. También del puerto 80 
byte mac[]={0xDE, 0xAD, 0xBE, 0xEF, 0xFF, 0xEE}; //MAC 
IPAddress ip(192,168,0,5); //IP 
EthernetServer servidor(80); 
int PIN_LED=8; 
int PIN_LED2=9;
String readString=String(30); //lee los caracteres de una secuencia en una cadena.
//Los strings se representan como arrays de caracteres (tipo char) 
String state=String(3);
void setup() {
Ethernet.begin(mac, ip); //Inicializamos con las direcciones asignadas 
servidor.begin(); 
pinMode(PIN_LED,OUTPUT);
digitalWrite(PIN_LED,LOW);
state="OFF";

}
void loop() {
  //EthernetClient Crea un cliente que se puede conectar a 
  //una dirección específica de Internet IP
EthernetClient cliente= servidor.available(); 
if(cliente) {
boolean lineaenblanco=true; 
while(cliente.connected()) {
if(cliente.available()) {
char c=cliente.read(); 
if(readString.length()<30) {
readString.concat(c);
//Cliente conectado
//Leemos petición HTTP caracter a caracter
//Almacenar los caracteres en la variable readString
} 
if(c=='\n' && lineaenblanco) //Si la petición HTTP ha finalizado 
{
int LED = readString.indexOf("LED="); 
if(readString.substring(LED,LED+5)=="LED=T") {
digitalWrite(PIN_LED,HIGH);
digitalWrite(PIN_LED2,LOW);
state="ON"; } 
else if (readString.substring(LED,LED+5)=="LED=F") {
digitalWrite(PIN_LED,LOW);
digitalWrite(PIN_LED2,HIGH);
state="OFF";
}
//Cabecera HTTP estándar
cliente.println("HTTP/1.1 200 OK"); 
cliente.println("Content-Type: text/html"); 
cliente.println(); //Página Web en HTML 
cliente.println("<html>"); 
cliente.println("<head>"); 
cliente.println("<title>LAMPARA ON/OFF</title>"); 
cliente.println("<script src='//code.jquery.com/jquery-1.11.2.min.js'></script>");
cliente.println("<script src='//code.jquery.com/jquery-migrate-1.2.1.min.js'></script>");
cliente.println("<script src='http://192.168.0.103:3000/socket.io/socket.io.js'></script>");
cliente.println("<script src='http://192.168.0.103/arduino_led/funciones.js'></script>");

cliente.println("</head>");
cliente.println("<body width=100% height=100%>"); 
//Cabecera HTTP estándar
cliente.println("<center>"); 
cliente.println("<h1>LAMPARA ON/OFF</h1>");
cliente.print("<br><br>"); 
cliente.print("Estado de la lampara: "); 
cliente.print(state);

cliente.print("<br><br><br><br>"); 
cliente.println("<div class='wrapper'>");//wrapper a 
    cliente.println("<div class='container'>");//container a
 cliente.println("<div class='col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2'>");//col formulario a
        cliente.println("<form id='logon-form' action='#' method=post>");  //form a
            cliente.println("<div class='input-group'>");//input-group Usuario Nombre a
                cliente.println("<span class='input-group-addon'><i class='fa fa-user'></i></span>");//span usuario nombre
                cliente.println("<input placeholder='Nombre de Usuario' class='form-control' name='CrugeLogon[username]' id='CrugeLogon_username' type=text maxlength='45'>");
                cliente.println("</div>");//input-group Usuario Nombre c
                                    cliente.println("<br>");
            cliente.println("<div class='input-group'>");//input-group Usuario Pass a
                cliente.println("<span class='input-group-addon'><i class='fa fa-lock'></i></span>");
                cliente.println("<input placeholder='Password' class='form-control' name='CrugeLogon[password]' id='CrugeLogon_password' type=password maxlength='20'>");
                cliente.println("</div>");//input-group Usuario Pass c
            cliente.println("<br>");
            cliente.println("<button id='btnIngresar' type=button class='btn btn-default'>Iniciar Session</button> ");  
            cliente.println("</form>");  //form a
              cliente.println("</div>");//col formulario a
        cliente.println("</div>");//containes c
    cliente.println("</div>");//Wrapper c

cliente.println("</body>"); 
cliente.println("</html>"); 
cliente.stop();
//Cierro conexión con el cliente 
readString="";
}
}
}
}
}
