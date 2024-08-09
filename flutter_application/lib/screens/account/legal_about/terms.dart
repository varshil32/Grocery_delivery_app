import 'dart:io';

import 'app_properties.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class TermsPage extends StatefulWidget {
  @override
  _TermsPageState createState() => _TermsPageState();
}

class _TermsPageState extends State<TermsPage> {
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
                      "1. Acceptance of Term:\nYou agree to these Terms and Conditions by downloading and/or using the Famiecare Grocery Mobile Application. If you do not agree to these Terms and Conditions, you should not use the Famiecare Grocery Mobile Application.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "2. Use of Application:\nThe Famiecare Grocery Mobile Application is provided to you for personal use only. You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Application without the express written permission of Famiecare.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "3. Registration:\nIn order to use the Famiecare Grocery Mobile Application, you may be required to register and create an account. You agree to provide accurate and complete information when creating an account, and to keep your login information confidential.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "4. User Conduct\nYou agree to use the Famiecare Grocery Mobile Application for lawful purposes only. You agree not to use the Application to:\n\n-Violate any local, state, national, or international law or regulation\n-Transmit any material that is unlawful, harassing, defamatory, or otherwise objectionable\n-Impersonate any person or entity, including but not limited to, a Famiecare representative\n-Transmit any viruses, Trojan horses, worms, or other computer programs that may damage or interfere with the operation of the Application\n-Attempt to gain unauthorized access to the Application or any related systems or networks",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "5. Intellectual Property:\nAll trademarks, logos, service marks, and trade names used on the Famiecare Grocery Mobile Application are the property of their respective owners. You agree not to use any of these without the prior written consent of the owner.",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "6. Contact Information:\nIf you have any questions or comments about these Terms and Conditions, please contact us at support@famiecare.com.",
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
