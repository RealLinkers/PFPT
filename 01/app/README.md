# Setup guide

### Run with Docker
cd PFPT/01
docker-compose up
Webserver will be located on http://localhost:7337

# Vulnerabilities present

### SQL Injection in login
 * `name=user' AND 1=0 UNION ALL SELECT "user","pass";-- &password=pass`

### FILE Upload
 * Randomizes last 2 characters before extension
