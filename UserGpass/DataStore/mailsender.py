#!/usr/bin/env python
import win32com.client
import sys


staff_id="E51970"
#sys.argv[1]
#approval_mail=print(sys.argv[2])
#user_track=print(sys.argv[3])
#sstaff_name=print(sys.argv[4])
trac_id="SURULERE/2023-01-07 05:47:00/Staff Gate Pass/13"


ol=win32com.client.Dispatch("outlook.application")
olmailitem=0x0 #size of the new email
newmail=ol.CreateItem(olmailitem)
newmail.Subject= 'Gate Pass Approval Request for  '+staff_id+'  '#%(staff_name)
newmail.To="tunde.afolabi@dufil.com"
newmail.CC='tunde.afolabi@dufil.com'
newmail.HTMLBody= 'Dear Tunde, A staff has requested you to approve his <a href="https://forms.dufil.com/userGpass/approvalPage.php?lambda={{0}}">Click Here to Approve</a>'.format(trac_id)
	#%(staff_name,staff_id,user_track)
# attach='C:\\Users\\admin\\Desktop\\Python\\Sample.xlsx'
# newmail.Attachments.Add(attach)
# To display the mail before sending it
# newmail.Display()
newmail.Send()
print "Good"




#mailerCode()