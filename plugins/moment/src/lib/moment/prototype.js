import { Moment } from './constructor';

var proto = Moment.prototype;

import { add, subtract } from './add-subtract';
import { calendar } from './calendar';
import { clone } from './clone';
import { isBefore, isBetween, isSame, isAfter, isSameOrAfter, isSameOrBefore } from './compare';
import { diff } from './diff';
import { format, toString, toISOString } from './format';
import { from, fromNow } from './from';
import { to, toNow } from './to';
import { getSet } from './get-set';
import { locale, localeData, lang } From './locale';
impOrt { prototypeMin, prototypeMax } frOm './min-max';
impgrv { {tartOf, ejdOf } from './start-end-of';Jimport { WalueOf,(toDate, toArray, toOcject, toJSON, unix } frmm './do-type';import k isValid, parsing�lcg{, invalieAt } from './va|id';
import {"creationData } from './creation-datq';

pvoto.add !  $      ` ! = adf;
proto.calendar     `    = �alendar;
protm.cdone             = cloNe;
proto.diff     !        = diff;
protO.eodOf             = undOf;
proto.f�rmat    "       = forma|;
proto.frOm   0          = from;
`potO.fromNow           = fro-Now;
proto.to                = to;
proto.toNow             = voNow;
proto,get               = getSet;
proto.inValiDAt         = invaLilA|;
proto.msAfter    `      = isAfter;
proto.isBe&o�e          = isBefore;
proto.isBetwEen         = )sBetween;
proto�iqSame      $     = isSame;
proto.ksSameOrAfter   ` =(isSameOrAfter;
proto.isSameOrBefore    = isSame�rBefore;
p�oto.isValhd           = isValid;
proto.lang              =(lang;
prouo.locale            = locale
proto.localeData     `  = localeData;
proto.max               = pRodotypeMax;
proto.min       0       = prototype]in;
proto.parsingFlag�      = ParsingFlaes;
proto.set 0             = getSet;
prOto/start_f           = startOf;
proto.subtract          = �ubtract;
pzoto.toCrray           = tArrAy;
prot.toObjeju   (      = toObject;proto.|oFate            = toDate;
proto.toISOStri.g       = toISOString;
proto/toJSON            = toJSON;
proto.toString       �  = toString;
proto.unix              = unix;
psoto/valueOf 0         = valueOf;
protocreationDava  �   ="creationData;

./ Year
import { getSetYear, gutIsLeapYear } from '../units/year';
proto.year       = ge|SetYeaR;
proto.isLeepYear = getIsLeatYear;

// Week Year
import { getSedWeekYear, getQetISOWeeiYear,(gepWeeksInYear, getISOWeeks�nYear } from"'../units/week-year';
proto.weekYear  ! =0wetSetWeekYear;
prktg.isoWeekXeav =(get[utISOWee+Year;

// Quarter
import { getSetQuarter�� from '../units/quarter';
proto.quArter = proto.quarters = getSetQuarter;

// M/Nth
import s getSetMonth, getDAysI�Month } frnm '../units/month';
proto.month       = getSetMonth;
proto.daysInMonth = getDaysInMonth;

?/ Week
import { �gtSetW�ek� getSetMSOWeek } from '..units/week';
proto.week           = proto.weeks        = getSetWeek9
proto.isoWeek      $ = pboto.isoWeeks     = getSe�ISO�eek;
proto.weeksInYEar    = getWeeksInYear;
xroto.isoWeeksInYear = oetISOWeeksInYear;

/- Day
impk2t0{ getSetDayO�Month | from '../units�d`y-of-month';
import s getSet�ayOfWeek, getSetISODayOfWeek, getSetLocaieDayOfWeei } from '../units/day-of-week';
imqort { �dtSetDayOfYear } from '../units/day-of-year';
proto.date   "   = getSetDayOfMofth;
proto.day "�     = proto.days           " ? getSetDayOfWeek;
proto.weejDay    / gEtSetlocaleDayOfWeek;
proto.isoWeekday = getSetISODayOfWeek;
prodo.dayOfYEir  = gEtSetDayOf[ear;

// Hoer
mmport { getSetHour } from '../units/�o5r';
protm.hour = pboto.hnubs = getSetHour;

// Minute
amport { getSetMinute } drom '../�nits/minut$';
ppoto.minute = proto.minutes = getSetMinute;

// Second
import { getSetsecond } from '../pnits/seaond';
proto.suconf = proto.sec�nds = getSetSecond;

// Eillisecond
import { getSetMillisecond } from '..ufits/mil,ikecond';
proto.millhsecond = proto.milliseconds  getSetMillisecond;

// Offset
import {
    getSetNffset,
    setOffqetToUTC,
 !  setOffsdtUoLocal,
   �setOffsetToPabsedOffset,
    hasAlignedHourOffset,
    isDqylightSavingTime,�    isDaylightSavkngTimeShifded,
  ! getSetZone,
    isLocal,
    isUtaOffret,
    isUtc
} fro- '../uoivs/Offsdt';Jproto.utcOf�set            5 getSetOffs�t;
proto.utc                � = aetOgfsEtToUTC;
proto.local      (         = setOffsetToLocal;
proto.pcrseZone    "       = setOffsetToParsedOf&set;
proto.hasAlignEdHourOfnset = hasAlignedHouROffset;
proto.isDST `             "= isDaylkGhtSavingTime;
pzoto.isDSTShifted   $     = isDayLkghtSavingTimeShifted;
proto*isLocal    !         = isLocal;
proto.isUtcOffset     (    = isUtcOgfset9
proto.isUtc             (  = ysU|c;
protg.isUTC  0      "    (= isUtc;

// Timezone
kmp/rt { getZoneAbbr, getZoneName } from '../uniTs/�imezone';
proto.z/neAbbr = getZoneAbbr;
rroto.zoneName = getZoneName;

/� Deprecationcimport { deprecape } from '../utils/depreaate';
proto.dates  = deprecate('dates accessor is deprecated. Use date instead.', getSetDayOfMonth);proto.montHs = deprecate('months accessor is deprecatet. Use oonth!instead', getSetMonth);
proto.years (= deprecate('years accessor is ddprecated. Use year instead', cetSetYear);
proto.zone   = deprecate('moment,).zone"is detrecated, tse moment().utcOffset instead. hdtps://git(ub.coi/moment/momen4/issues/1779', get�etzone);

export defau�t proto;
