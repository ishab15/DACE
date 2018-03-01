Device Automation and Control Using ESP8266

ESP8266 can be configured either in sending mode i.e the AP mode or the receiver mode i.e. the ST mode, one at a time. In our project we have configured the ESP8266 in the sender mode initially. During this period, the application board that we have used takes temperature reading from the temperature sensors i.e. LM35. Once the temperature has been collected, it gets uploaded to the open IOT platform (www.thingspeak.com). Having received a certain number of temperature readings, the serial monitor of the arduino IDE prompts a message asking the user to configure the ESP8266 in the receiver mode.

When in receiver mode, we are controlling the speed of a DC motor from a local host that we have hosted using WAMP server. The speeds can vary between HIGH, LOW and STOP.
