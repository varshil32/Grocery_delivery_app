import 'dart:io';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class checkTermsPage extends StatefulWidget {
  @override
  _TermsPageState createState() => _TermsPageState();
}

class _TermsPageState extends State<checkTermsPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        iconTheme: IconThemeData(
          color: Colors.black,
        ),
        brightness: Brightness.light,
        backgroundColor: Colors.transparent,
        // title: Text(
        //   'Settings',
        //   style: TextStyle(color: darkGrey),
        // ),
        elevation: 0,
      ),
      body: SafeArea(
        bottom: true,
        child: Padding(
          padding: const EdgeInsets.only(top: 24.0, left: 24.0, right: 24.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              Padding(
                padding: const EdgeInsets.only(bottom: 16.0),
                child: Text(
                  'Terms of Use',
                  style: TextStyle(
                      color: Colors.black,
                      fontWeight: FontWeight.bold,
                      fontSize: 25.0),
                ),
              ),
              Flexible(
                  child: Padding(
                padding: const EdgeInsets.all(15.0),
                child: ListView(
                  children: [
                    Text(
                      "1. Order Placement:\nAll orders must be placed through the designated channels specified by the seller, and must be accompanied by full payment.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "2. Order Cancellation:\nOrders may be cancelled up until the point that they have been shipped. Refunds for cancelled orders will be issued within 7 business days.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "3. Shipping:\nShipping times and methods will be specified by the seller at the time of order placement. The seller is not responsible for delays or damages caused by the shipping carrier..",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "4. Returns and Refunds:\nAll sales are final unless otherwise specified by the seller. If a return is authorized by the seller, the buyer is responsible for return shipping costs. Refunds will be issued within 7 business days of receipt of returned merchandise.",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "5. Product Warranty:\nAll products are covered by the manufacturer's warranty, if applicable. The seller does not provide any additional warranty beyond that provided by the manufacturer..",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "6. Limitation of Liability:\nThe seller shall not be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use or inability to use the products sold, even if the seller has been advised of the possibility of such damages.",
                        style: TextStyle(fontSize: 15.0)),
                  ],
                ),
              )),
            ],
          ),
        ),
      ),
    );
  }
}
