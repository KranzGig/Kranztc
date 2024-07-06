from twilio.rest import Client

account_sid = 'AC41dfb8b1dc3f281c1c66281fd306798d'
auth_token = '6e9a7684e44a6e39eb866bdfa7de8217'
client = Client(account_sid, auth_token)

message = client.messages.create(
  from_='+18445311557',
  body='Hello from Twilio',
  to='+19705678863'
)

print(message.sid)