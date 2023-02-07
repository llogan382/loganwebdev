import { parseISO, format } from 'date-fns'

type Props = {
  dateString: string
}

const DateFormatter = ({ dateString }: Props) => {
  const date = new Date()
  return <time dateTime={dateString}>{format(date, 'MM-dd-yy')}</time>
}

export default DateFormatter
