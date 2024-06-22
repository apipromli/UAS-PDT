const mysql = require('mysql');
const redis = require('redis');
const MongoClient = require('mongodb').MongoClient;

// MySQL
const mysqlConnection = mysql.createConnection({
  host: 'mysql-master',
  user: 'root',
  password: 'rootpassword',
  database: 'registration'
});

mysqlConnection.connect(err => {
  if (err) {
    console.error('MySQL connection error:', err.stack);
    return;
  }
  console.log('MySQL connected as id ' + mysqlConnection.threadId);
});

// Redis
const redisClient = redis.createClient({
  host: 'redis',
  port: 6379
});

redisClient.on('connect', () => {
  console.log('Redis client connected');
});

redisClient.on('error', err => {
  console.error('Redis connection error:', err);
});

// MongoDB
const mongoUrl = "mongodb://mongo:27017";
MongoClient.connect(mongoUrl, { useNewUrlParser: true, useUnifiedTopology: true }, (err, client) => {
  if (err) {
    console.error('MongoDB connection error:', err);
    return;
  }
  const db = client.db('registration');
  console.log('MongoDB connected');
});
