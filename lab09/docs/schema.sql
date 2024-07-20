create database emergency_waitlist;
use emergency_waitlist;

/* Create the tables */ 
CREATE TABLE administrator;
CREATE TABLE patient;
CREATE TABLE staff;
CREATE TABLE PatientRecord;
CREATE TABLE queue;

/* Create sample data */
INSERT INTO administrator (username, loginCode) VALUES ('admin', '123');
INSERT INTO patient (name, patientID, loginCode) VALUES ('John Doe', '1', '001');