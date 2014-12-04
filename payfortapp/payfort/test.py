import subprocess
from pysimplesoap.client import SoapClient
from suds.client import Client
subprocess.call("php ./PAYatSTORE.php", shell=True)
# subprocess.call("php ./PAYMENT_NOTIFICATION.php", shell=True)


# from suds.plugin import *
# class NamespaceCorrectionPlugin(MessagePlugin):
#     def received(self, context):
#         context.reply = context.reply.replace('"http://namespaces.soaplite.com/perl"','"API"')

# wsdl = "https://sandbox.payfort.com/payment/payat/merchants/payments.wsdl"
# # wsdl += '<wsdl:service name="DeviceService">\n<wsdl:port binding="tds:DeviceBinding" name="DevicePort">\n<soap:address location="http://localhost/onvif/device_service/"/>'
# # wsdl += '</wsdl:port>\n</wsdl:service> '
# client = Client(wsdl)

# payAtStore = {
# 	'merchantID'    : 'elproff' ,
#         'orderID'       : 'elprofforder3',
#         'amount'        : '50',
#         'currency'      : 'EGP' ,
#         'itemName'      : 'iPad Mini' ,
#         'expiryDate'    : '2015-06-14T10:10:48+04:00' , 
#         'clientName'    : 'Mohannad Banayosi',
#         'clientEmail'   : 'm.banayosi@gmail.com',
#         'clientMobile'  : '00201061174755',
#         'ticketNumber'  : 'ticket',
#         'serviceName'   : 'FirstConnection'
# }
# print payAtStore
# print client