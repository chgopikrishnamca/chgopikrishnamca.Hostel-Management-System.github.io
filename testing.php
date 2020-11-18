public class ScreenReceiver extends BroadcastReceiver {

public static boolean wasScreenOn = true;
private long tStart;
private long tEnd;

@Override
public void onReceive(Context context, Intent intent) {
if (intent.getAction().equals(Intent.ACTION_SCREEN_OFF)) {

wasScreenOn = false;

tEnd = System.currentTimeMillis();
long tDelta = tEnd - tStart;
double elapsedSeconds = tDelta / 1000.0;

cancelAlarm(context);


} else if (intent.getAction().equals(Intent.ACTION_SCREEN_ON)) {

wasScreenOn = true;
tStart = System.currentTimeMillis();

scheduleAlarm(context);

}
}

public void scheduleAlarm(Context context) {

Intent intent = new Intent(context, MyAlarmReciever.class);
final PendingIntent pIntent = PendingIntent.getBroadcast(context, MyAlarmReciever.REQUEST_CODE,
intent, PendingIntent.FLAG_UPDATE_CURRENT);
long firstMillis = System.currentTimeMillis(); // alarm is set right away
AlarmManager alarm = (AlarmManager) context.getSystemService(Context.ALARM_SERVICE);
alarm.set(AlarmManager.RTC_WAKEUP, firstMillis+5000, pIntent);

}


public static void scheduleAlarmNow(Context context) {

Intent intent = new Intent(context, MyAlarmReciever.class);
final PendingIntent pIntent = PendingIntent.getBroadcast(context, MyAlarmReciever.REQUEST_CODE,
intent, PendingIntent.FLAG_UPDATE_CURRENT);
long firstMillis = System.currentTimeMillis(); // alarm is set right away
AlarmManager alarm = (AlarmManager) context.getSystemService(Context.ALARM_SERVICE);
alarm.set(AlarmManager.RTC_WAKEUP, firstMillis+(7200000), pIntent);

}



public void cancelAlarm(Context context) {
Intent intent = new Intent(context, MyAlarmReciever.class);
final PendingIntent pIntent = PendingIntent.getBroadcast(context, MyAlarmReciever.REQUEST_CODE,
intent, PendingIntent.FLAG_UPDATE_CURRENT);
AlarmManager alarm = (AlarmManager) context.getSystemService(Context.ALARM_SERVICE);
alarm.cancel(pIntent);
}

}


code for nofication service

public class NotificationService extends IntentService {


public NotificationService() {
super("notification");
}

@Override
protected void onHandleIntent(Intent intent) {

screenAlertMessage(getApplicationContext(),"Take a break.");
}

private void screenAlertMessage(Context context, String msg) {

NotificationCompat.Builder mBuilder =
new NotificationCompat.Builder(context)
.setSmallIcon(R.mipmap.ic_launcher)
.setContentTitle("Relax your eyes a little bit.")
.setPriority(Notification.PRIORITY_HIGH)
.setVibrate(new long[0])
.setAutoCancel(true)
.setContentText(msg);

int mNotificationId = 001;

NotificationManager mNotifyMgr =
(NotificationManager) context.getSystemService(context.NOTIFICATION_SERVICE);
mNotifyMgr.notify(mNotificationId, mBuilder.build());

}
}

code for alaram service

public class MyAlarmReciever extends BroadcastReceiver {

public static final int REQUEST_CODE = 12345;

@Override
public void onReceive(Context context, Intent intent) {

Intent notifIntent = new Intent(context,NotificationService.class);
context.startService(notifIntent);
}
}
