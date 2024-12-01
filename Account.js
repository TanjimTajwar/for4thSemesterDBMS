const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const cors = require('cors');
const app = express();

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// MySQL Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '975321',
    database: 'jobra_movies',
});

// Connect to MySQL
db.connect((err) => {
    if (err) {
        console.error('Database connection failed: ' + err.stack);
        return;
    }
    console.log('Connected to MySQL database.');
});

// API Endpoint to Handle Form Data
app.post('/submit-account', (req, res) => {
    const { firstName, middleName, lastName, email, mobile, dob, gender } = req.body;

    // Insert Query
    const sql = `INSERT INTO users (firstName, middleName, lastName, email, mobile, dob, gender) 
                 VALUES (?, ?, ?, ?, ?, ?, ?)`;

    db.query(sql, [firstName, middleName, lastName, email, mobile, dob, gender], (err, result) => {
        if (err) {
            console.error('Error inserting data: ', err);
            res.status(500).send('Failed to insert data.');
        } else {
            console.log('Data inserted successfully.');
            res.status(200).send('Account details submitted successfully.');
        }
    });
});

// Start the Server
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});
