import { parseISO, format } from 'date-fns'

type Props = {
  dateString: string
}

const DateFormatter = ({ dateString }: Props) => {
  console.log(dateString)
  const date = new Date(dateString)
  return <time dateTime={dateString}>{date.toDateString()}</time>
}

export default DateFormatter
