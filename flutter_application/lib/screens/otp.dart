import 'dart:async';

import 'package:flutter/material.dart';
import 'dart:math';
import 'package:flutter/services.dart';
import 'package:grocery_app/screens/dashboard/dashboard_screen.dart';
import 'package:pin_code_text_field/pin_code_text_field.dart';
import 'package:fluttertoast/fluttertoast.dart';

class ConfirmOtpPage extends StatefulWidget {
  @override
  _ConfirmOtpPageState createState() => _ConfirmOtpPageState();
}

//late String generatedOTP;
late int generatedOTP;
late Timer _timer;
int _duration = 30;
bool _isResendButtonEnabled = false;

class _ConfirmOtpPageState extends State<ConfirmOtpPage> {

  TextEditingController otp1 = TextEditingController(text: '');
  TextEditingController otp2 = TextEditingController(text: '');
  TextEditingController otp3 = TextEditingController(text: '');
  TextEditingController otp4 = TextEditingController(text: '');

  @override
  void initState() {
    super.initState();
    generatedOTP = int.parse(generateRandomOTP());
    print(generatedOTP);
    //generatedOTP = generateRandomOTP();
    generatedOTP = int.parse(generateRandomOTP());
    print(generatedOTP);

    // Start the timer
    _timer = Timer.periodic(Duration(seconds: 1), (timer) {
      setState(() {
        _duration--;
      });

      // If the timer reaches zero, cancel it and enable the resend OTP functionality
      if (_duration == 0) {
        _timer.cancel();
        _isResendButtonEnabled = true;
      }
    });
  }

  void _resendOTP() {
    generatedOTP = int.parse(generateRandomOTP());
    print(generatedOTP);

    // Restart the timer
    _duration = 30;
    _timer = Timer.periodic(Duration(seconds: 1), (timer) {
      setState(() {
        _duration--;
      });

      // If the timer reaches zero, cancel it and enable the resend OTP functionality
      if (_duration == 0) {
        _timer.cancel();
        _isResendButtonEnabled = true;
      }
    });

    // Disable the resend OTP functionality
    _isResendButtonEnabled = false;
  }

  String generateRandomOTP() {
    Random random = Random();
    int otp = random.nextInt(10000);
    return otp.toString().padLeft(4, '0');
  }

  Widget otpBox(TextEditingController otpController) {
    return Container(
      height: 48,
      width: 48,
      decoration: BoxDecoration(
          color: Color.fromRGBO(255, 255, 255, 0.8),
          borderRadius: BorderRadius.all(Radius.circular(10))),
      child: Center(
        child: SizedBox(
          width: 9,
          child: Padding(
            padding: const EdgeInsets.only(top: 8.0),
            child: TextField(
              controller: otpController,
              decoration: InputDecoration(
                  border: InputBorder.none, contentPadding: EdgeInsets.zero),
              style: TextStyle(fontSize: 16.0),
              keyboardType: TextInputType.number,
            ),
          ),
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    Widget title = Text(
      'Confirm your OTP',
      style: TextStyle(
        color: Colors.black,
        fontSize: 34.0,
        fontWeight: FontWeight.bold,
      ),
    );

    Widget subTitle = Padding(
        padding: const EdgeInsets.only(right: 56.0),
        child: Text(
          'Please wait, we are confirming your OTP',
          style: TextStyle(
            color: Colors.black,
            fontSize: 16.0,
          ),
        ));

    Widget verifyButton = Center(
      child: InkWell(
        onTap: () {
          String enteredOTP = otp1.text + otp2.text + otp3.text + otp4.text;
          String otpnew = enteredOTP.toString();
          String otpnew1 = generatedOTP.toString();
          if (otpnew == otpnew1) {
            Navigator.of(context)
                .push(MaterialPageRoute(builder: (_) => DashboardScreen()));
          } else {
            // Show an error message or handle the incorrect OTP case
            Fluttertoast.showToast(
              msg: "Incorrect OTP, please try again.",
              toastLength: Toast.LENGTH_SHORT,
              gravity: ToastGravity.BOTTOM,
              timeInSecForIosWeb: 1,
              backgroundColor: Colors.red,
              textColor: Colors.white,
              fontSize: 16.0,
            );
          }
        },
        child: Container(
          width: MediaQuery.of(context).size.width / 2,
          height: 80,
          child: Center(
              child: new Text("Verify",
                  style: const TextStyle(
                      color: const Color(0xfffefefe),
                      fontWeight: FontWeight.w600,
                      fontStyle: FontStyle.normal,
                      fontSize: 20.0))),
          decoration: BoxDecoration(
              gradient: LinearGradient(
                  colors: [
                    Colors.green,
                    Colors.green,
                    Colors.green,
                  ],
                  begin: FractionalOffset.topCenter,
                  end: FractionalOffset.bottomCenter),
              boxShadow: [
                BoxShadow(
                  color: Color.fromRGBO(0, 0, 0, 0.16),
                  offset: Offset(0, 5),
                  blurRadius: 10.0,
                )
              ],
              borderRadius: BorderRadius.circular(9.0)),
        ),
      ),
    );

    Widget otpCode = Container(
      padding: const EdgeInsets.only(right: 28.0),
      height: 190,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: <Widget>[
          otpBox(otp1),
          otpBox(otp2),
          otpBox(otp3),
          otpBox(otp4),
        ],
      ),
    );

    Widget resendText = Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: <Widget>[
        Text(
          _isResendButtonEnabled
              ? "Resend OTP"
              : "Resend again after " +
                  "00:${_duration.toString().padLeft(2, '0')}",
          style: TextStyle(
            fontStyle: FontStyle.italic,
            color: _isResendButtonEnabled ? Colors.green : Colors.black,
            fontSize: 14.0,
          ),
        ),
        if (_isResendButtonEnabled)
          InkWell(
            onTap: _resendOTP,
            child: Text(
              " Resend",
              style: TextStyle(
                fontStyle: FontStyle.italic,
                color: Colors.green,
                fontSize: 14.0,
              ),
            ),
          ),
      ],
    );

    return GestureDetector(
      onTap: () => FocusScope.of(context).requestFocus(new FocusNode()),
      child: Container(
        child: Scaffold(
          appBar: AppBar(
            leading: IconButton(
              icon: Icon(Icons.arrow_back),
              onPressed: () => Navigator.of(context).pop(),
              color: Colors.black,
            ),
            backgroundColor: Colors.transparent,
            elevation: 0.0,
          ),
          body: Stack(
            children: <Widget>[
              Padding(
                padding: const EdgeInsets.only(left: 28.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Spacer(flex: 3),
                    title,
                    Spacer(),
                    subTitle,
                    Spacer(flex: 1),
                    Padding(
                      padding: const EdgeInsets.only(right: 28.0),
                      child: Center(
                        child: PinCodeTextField(
                          controller: otp1,
                          highlightColor: Colors.white,
                          highlightAnimation: true,
                          highlightAnimationBeginColor: Colors.white,
                          highlightAnimationEndColor:
                              Theme.of(context).primaryColor,
                          pinTextAnimatedSwitcherDuration:
                              Duration(milliseconds: 500),
                          wrapAlignment: WrapAlignment.center,
                          hasTextBorderColor: Colors.transparent,
                          highlightPinBoxColor: Colors.white,
                          autofocus: true,
                          pinBoxHeight: 60,
                          pinBoxWidth: 60,
                          pinBoxRadius: 5,
                          defaultBorderColor: Colors.black45,
                          pinBoxColor: Color.fromRGBO(255, 255, 255, 0.8),
                          maxLength: 4,
                        ),
                      ),
                    ),
                    Spacer(flex: 1),
                    Padding(
                      padding: const EdgeInsets.only(right: 28.0),
                      child: verifyButton,
                    ),
                    Spacer(flex: 2),
                    resendText,
                    Spacer()
                  ],
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
