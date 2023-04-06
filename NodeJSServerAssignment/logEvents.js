const { format } = require("date-fns");
const { v4: uuidv4 } = require("uuid");

const fs = require("fs");
const promises = require("fs").promises;
const path = require("path");


let dateTime = format(new Date(), "MM-dd-yyyy\thh:mm:ss");
let uuid = uuidv4();

console.log("Logging Started: ",dateTime);

const logEvents = async(eventName) => {
  dateTime = format(new Date(), "MM-dd-yyyy\thh:mm:ss");
  uuid = uuidv4();
  try {
  
    if (!fs.existsSync(path.join(__dirname,"logs"))) {
      await promises.mkdir("./logs/", (err) => {if (err) throw err;});
    }
    fs.appendFileSync(path.join(__dirname,"logs","eventLogs.txt"), dateTime + " " + uuid + "\t\t" + eventName + "\n", (err) => {if (err) throw err; console.log("logged to file");});

  } catch (error) {
    console.log(error);
  }

}

module.exports = logEvents;