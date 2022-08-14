import moment from 'moment'
import 'moment/locale/tr';

export const useMoment = (...args) => {
    moment.locale('tr')
    return moment(...args)
}
