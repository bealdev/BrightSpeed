# BrightSpeed - Merchant Gateway Integration

BrightSpeed is a payment processing gatway used to process transactions via API.

## Getting Started

Authorization credentials provided by BrightSpeed is required in order to test the API.

### Prerequisites

The API can be achieved successfully via basic http request with POST method. $this->username and $this->password can be exchanged with credentials provided by BrightSpeed.

```
https://portalDev.bright-speed.com/api/v1/payments/transaction?username=johnDoe&password=doe123&source=893493841&...;
```

## Running the tests

Testing was achieved through test cards provided by BrightSpeed. Sale, Authorize, Capture, and Refund were the methods of the transactions. 

### Break down into end to end tests

The test card was tested once a successful response was received. Random debit card credentials were tested.

## Authors

* **Brian Beal** - *Initial work* - [bealdev](https://github.com/bealdev)
